<?php

use Lodipay\Qpay\Api\DTO\AuthTokenDTO;
use Lodipay\Qpay\Api\DTO\CreateInvoiceRequest;
use Lodipay\Qpay\Api\DTO\CreateInvoiceResponse;
use Lodipay\Qpay\Api\DTO\GetInvoiceResponse;
use Lodipay\Qpay\Api\Enum\Env;
use Lodipay\Qpay\Api\QPayApi;
use Monolog\Handler\StreamHandler;
use Monolog\Level;
use Monolog\Logger;

$logger = new Logger('test');
$logger->pushHandler(new StreamHandler(STDOUT, Level::Debug));
$api = new QPayApi(
    username: 'TEST_MERCHANT',
    password: '123456',
    env: Env::SANDBOX,
    options: ['logger' => $logger]
);

it('gets authToken', function () use ($api) {
    $authToken = $api->getAuthToken();
    expect($authToken)->not()->toBeNull();

    return $authToken;
});

it('extends accessToken', function (AuthTokenDTO $authToken) use ($api) {
    $newAuthToken = $api->refreshAuthToken($authToken->refreshToken);
    expect($newAuthToken)->not()->toBeNull();
})->depends('it gets authToken');

it('creates invoice', function () use ($api) {
    $response = $api->createInvoice(
        CreateInvoiceRequest::from([
            'invoiceCode' => 'TEST_INVOICE',
            'senderInvoiceNo' => '1234567',
            'invoiceReceiverCode' => 'terminal',
            'invoiceDescription' => 'test',
            'amount' => 100.0,
            'callbackUrl' => 'https://bd5492c3ee85.ngrok.io/payments?payment_id=123',
        ])
    );

    expect($response)
        ->not()->toBeNull()
        ->urls->toHaveCount(16)
    ;

    return $response;
})->depends('it extends accessToken');

it('gets the invoice', function (CreateInvoiceResponse $createInvoiceResponse) use ($api) {
    $getInvoiceResponse = $api->getInvoice($createInvoiceResponse->invoiceId);

    expect($getInvoiceResponse)
        ->senderInvoiceNo->toBe('1234567')
        ->senderInvoiceNo->toBe('1234567')
        ->invoiceDescription->toBe('test')
        ->callbackUrl->toBe('https://bd5492c3ee85.ngrok.io/payments?payment_id=123')
        ->totalAmount->toBe('100.00')
        ->grossAmount->toBe(100.0)
        ->invoiceStatus->toBe('OPEN')
    ;

    return $getInvoiceResponse;
})->depends('it creates invoice');

it('cancels the invoice', function (GetInvoiceResponse $getInvoiceResponse) use ($api) {
    $api->cancelInvoice($getInvoiceResponse->invoiceId);

    $getInvoiceResponse = $api->getInvoice($getInvoiceResponse->invoiceId);
    expect($getInvoiceResponse)
        ->invoiceStatus->toBe('CANCELED');
})->depends('it gets the invoice');
