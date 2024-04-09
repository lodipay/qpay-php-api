<?php

namespace Lodipay\Qpay\Api\DTO;

use Lodipay\DTO\Attributes\MapFrom;
use Lodipay\DTO\Attributes\MapTo;
use Lodipay\DTO\DTO\TseDTO;

class CreateInvoiceResponse extends TseDTO
{
    /**
     * Нэхэмжлэх үүсгэсэний дараа манайхаас үүсгэгдэх төлбөрийн дугаар /Object id  /
     * Жишээ: 00f94137-66fd-4d90-b2b2-8225c1b4ed2d.
     */
    #[MapFrom('invoice_id')]
    #[MapTo('invoice_id')]
    public string $invoiceId;
    /**
     * QR-ийн текст
     *
     * Жишээ: 0002010102121531279404962794049600000000KKTQPAY52046010530349654031005802MN5913TEST_MERCHANT6011Ulaanbaatar6244010712345670504test0721G7ZEWdbzkppBhJ1nouBhZ6304879D.
     */
    #[MapFrom('qr_text')]
    #[MapTo('qr_text')]
    public string $qrText;
    /**
     * Сайт дээр байршуулах бол QR image-ийг ашиглана.
     */
    #[MapFrom('qr_image')]
    #[MapTo('qr_image')]
    public string $qrImage;
    /**
     * QPay богино URL/бүх банкны апп орсон, смс илгээхэд ашиглаж болно/.
     * Example: https://s.qpay.mn/z1lKnIO5T.
     */
    #[MapFrom('qPay_shortUrl')]
    #[MapTo('qPay_shortUrl')]
    public string $qpayShortUrl;
    /**
     * Банкны апп-руу үсрэх холбоос линкүүд.
     *
     * Example:
     *
     * @var array<Url>
     */
    public array $urls;
}
