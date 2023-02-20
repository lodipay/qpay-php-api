<?php

namespace Tsetsee\Qpay\Api;

use Carbon\Carbon;
use Psr\Http\Message\ResponseInterface;
use Tsetsee\Qpay\Api\DTO\AuthTokenDTO;
use Tsetsee\Qpay\Api\DTO\CheckPaymentRequest;
use Tsetsee\Qpay\Api\DTO\CheckPaymentResponse;
use Tsetsee\Qpay\Api\DTO\CreateInvoiceRequest;
use Tsetsee\Qpay\Api\DTO\CreateInvoiceResponse;
use Tsetsee\Qpay\Api\DTO\ErrorDTO;
use Tsetsee\Qpay\Api\DTO\GetInvoiceResponse;
use Tsetsee\Qpay\Api\DTO\Payment;
use Tsetsee\Qpay\Api\Enum\BaseUrl;
use Tsetsee\Qpay\Api\Enum\Env;
use Tsetsee\Qpay\Api\Exception\BadResponseException;
use Tsetsee\TseGuzzle\TseGuzzle;

class QPayApi extends TseGuzzle
{
    private ?AuthTokenDTO $authToken = null;

    /**
     * @param array<string, mixed> $options
     */
    public function __construct(
        private string $username,
        private string $password,
        Env $env = Env::PROD,
        array $options = [],
    ) {
        $options['base_uri'] = (Env::PROD === $env ? BaseUrl::PROD : BaseUrl::SANDBOX)->value;
        parent::__construct($options);
    }

    /**
     * Access token авах API.
     * username: client_id, password: client_secret -ийг qPay -ээс авна.
     */
    public function getAuthToken(): AuthTokenDTO
    {
        $response = $this->sendRequest('POST', 'auth/token', [
            'auth' => [$this->username, $this->password],
        ]);

        return AuthTokenDTO::from($response->getBody(), 'json');
    }

    /**
     * Access token шинэчлэн авах API.
     */
    public function refreshAuthToken(string $refreshToken): AuthTokenDTO
    {
        $response = $this->sendRequest('POST', 'auth/refresh', [
            'headers' => [
                'Authorization' => 'Bearer '.$refreshToken,
            ],
        ]);

        return AuthTokenDTO::from($response->getBody(), 'json');
    }

    /**
     * Төлбөрийн нэхэмжлэл үүсгэх.
     * invoice_code -ийг qPay -ээс олгоно.
     */
    public function createInvoice(CreateInvoiceRequest $request): CreateInvoiceResponse
    {
        $response = $this->sendRequest('POST', 'invoice', [
            'oauth2' => true,
            'json' => $request->toArray(),
        ]);

        return CreateInvoiceResponse::from($response->getBody(), 'json');
    }

    /**
     * Үүсгэсэн нэхэмжлэлийн мэдээллийг харах.
     */
    public function getInvoice(string $invoiceId): GetInvoiceResponse
    {
        $response = $this->sendRequest('GET', 'invoice/'.$invoiceId, [
            'oauth2' => true,
        ]);

        return GetInvoiceResponse::from($response->getBody(), 'json');
    }

    /**
     * Төлбөрийн нэхэмжлэл цуцлах.
     */
    public function cancelInvoice(string $invoiceId): void
    {
        $this->sendRequest('DELETE', 'invoice/'.$invoiceId, [
            'oauth2' => true,
        ]);
    }

    /**
     * Үүссэн invoice_id-аар гүйлгээ хийгдсэн мэдээлэл авахад ашиглана
     * <red>АНХААРУУЛГА! Cron Job ашиглан гүйлгээ байнга шалгахыг хориглоно. Зөвхөн Callback URL ашиглана уу.</red>.
     */
    public function checkPayment(CheckPaymentRequest $request): CheckPaymentResponse
    {
        $response = $this->sendRequest('POST', 'payment/check', [
            'oauth2' => true,
            'json' => $request->toArray(),
        ]);

        return CheckPaymentResponse::from($response->getBody(), 'json');
    }

    /**
     * Payment id-аар гүйлгээ хийгдсэн мэдээлэл авахад ашиглана.
     * <red>АНХААРУУЛГА! Cron Job ашиглан гүйлгээ байнга шалгахыг хориглоно.
     *      Зөвхөн Callback URL ашиглана уу.</red>.
     */
    public function getPayment(string $paymentId): Payment
    {
        $response = $this->sendRequest('GET', 'payment/'.$paymentId, [
            'oauth2' => true,
        ]);

        return Payment::from($response->getBody(), 'json');
    }

    /**
     * Төлбөрийг буцаах, цуцлах үед ашиглана.
     * <red>АНХААРУУЛГА! Картын гүйлгээний үед л буцаах боломжтой</red>.
     */
    public function cancelPayment(string $paymentId, string $note): void
    {
        $this->sendRequest('DELETE', 'payment/cancel/'.$paymentId, [
            'oauth2' => true,
            'json' => [
                'callback_url' => 'https://qpay.mn/payment/result?payment_id='.$paymentId,
                'note' => $note,
            ],
        ]);
    }

    /**
     * Төлбөрийг буцаах, цуцлах үед ашиглана.
     * <red>АНХААРУУЛГА! Картын гүйлгээний үед л буцаах боломжтой</red>.
     */
    public function refundPayment(string $paymentId, string $note): void
    {
        $this->sendRequest('DELETE', 'payment/refund/'.$paymentId, [
            'oauth2' => true,
            'json' => [
                'callback_url' => 'https://qpay.mn/payment/result?payment_id='.$paymentId,
                'note' => $note,
            ],
        ]);
    }

    protected function getAccessToken(): string
    {
        if (!$this->isAccessTokenAlive()) {
            if ($this->isRefreshTokenAlive() && $this->authToken) {
                $this->setAccessToken($this->refreshAuthToken($this->authToken->refreshToken));
            } else {
                $this->setAccessToken($this->getAuthToken());
            }
        }

        if (null === $this->authToken) {
            throw new \Exception('cannot get access token');
        }

        return $this->authToken->accessToken;
    }

    private function setAccessToken(AuthTokenDTO $authTokenDTO): void
    {
        $this->authToken = $authTokenDTO;
    }

    private function isAccessTokenAlive(): bool
    {
        return null !== $this->authToken
            && Carbon::now()->lt($this->authToken->expiresIn);
    }

    private function isRefreshTokenAlive(): bool
    {
        return null !== $this->authToken
            && Carbon::now()->lt($this->authToken->refreshExpiresIn);
    }

    /**
     * @param array<string, mixed> $options
     */
    private function sendRequest(string $method, string $path, array $options = []): ResponseInterface
    {
        $response = $this->client->request($method, $path, $options);

        $errorDTO = ErrorDTO::from($response->getBody(), 'json');

        if (isset($errorDTO->error)) {
            throw new BadResponseException($errorDTO);
        }

        return $response;
    }
}
