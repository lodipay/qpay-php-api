<?php

namespace Lodipay\Qpay\Api\DTO;

use Carbon\CarbonImmutable;
use Lodipay\DTO\Attributes\MapFrom;
use Lodipay\DTO\DTO\TseDTO;

class GetInvoiceResponse extends TseDTO
{
    /**
     * Example: 737534d0-7ca5-4a3a-a58b-2e46c365002d.
     */
    #[MapFrom('invoice_id')]
    public string $invoiceId;
    /**
     * Example: OPEN.
     */
    #[MapFrom('invoice_status')]
    public string $invoiceStatus;
    /**
     * Байгууллагаас үүсгэх давтагдашгүй нэхэмжлэлийн дугаар
     * Example: 123.
     */
    #[MapFrom('sender_invoice_no')]
    public string $senderInvoiceNo;
    /**
     * Нэхэмжлэлийн утга
     * Example: Чихэр 5ш.
     */
    #[MapFrom('invoice_description')]
    public string $invoiceDescription;
    /**
     * Төлбөр төлсөгдсөн эсэх талаар мэдэгдэл авах URL.
     *
     * Example: https://bd5492c3ee85.ngrok.io/payments?payment_id=1234567
     */
    #[MapFrom('callback_url')]
    public string $callbackUrl;
    /**
     * Example: 100.
     */
    #[MapFrom('total_amount')]
    public string $totalAmount;
    /**
     * Example: 100.
     */
    #[MapFrom('gross_amount')]
    public float $grossAmount;
    /**
     * Example: 100.
     */
    #[MapFrom('tax_amount')]
    public float $taxAmount;
    /**
     * Example: 100.
     */
    #[MapFrom('surcharge_amount')]
    public float $surchargeAmount;
    /**
     * Example: 100.
     */
    #[MapFrom('discount_amount')]
    public float $discountAmount;
    /**
     * Байгууллагын салбарын код
     * Example: branch_01.
     */
    #[MapFrom('sender_branch_code')]
    public ?string $senderBranchCode;
    /**
     * Байгууллагын салбарын мэдээлэл.
     */
    #[MapFrom('sender_branch_data')]
    public ?SenderBranchData $senderBranchData;
    /**
     * Нэхэмжлэлийн хүчингүй болох огноо
     * Example: Чихэр 5ш.
     */
    #[MapFrom('invoice_due_date')]
    public ?CarbonImmutable $invoiceDueDate;
    /**
     * Хугацаа хэтэрсэн ч төлж болох эсэх
     * Example: FALSE.
     */
    #[MapFrom('enable_expiry')]
    public bool $enableExpiry;
    /**
     * Нэхэмжлэхийн дуусах хугацаа
     * Example: Date.
     */
    #[MapFrom('expiry_date')]
    public ?CarbonImmutable $expiryDate;
    /**
     * Хувааж төлж болох эсэх.
     *
     * Example: FALSE.
     */
    #[MapFrom('allow_partial')]
    public bool $allowPartial;
    /**
     * Төлөх хамгийн бага дүн.
     *
     * Example: 100.
     */
    #[MapFrom('minimum_amount')]
    public ?float $minimumAmount;
    /**
     * Илүү төлж болох.
     *
     * Example: FALSE.
     */
    #[MapFrom('allow_exceed')]
    public bool $allowExceed;
    /**
     * Төлөх хамгийн их дүн.
     *
     * Example: 100.
     */
    #[MapFrom('maximum_amount')]
    public ?float $maximumAmount;
    /**
     * Тэмдэглэл
     * Example: Тэмдэглэл.
     */
    public ?string $note;
    /**
     * Мөрүүд.
     *
     * @var ?array<Line>
     */
    public ?array $lines;
    /**
     * Гүйлгээ.
     *
     * @var ?array<Transaction>
     */
    public ?array $transactions;
}
