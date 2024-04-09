<?php

namespace Lodipay\Qpay\Api\DTO;

use Lodipay\DTO\Attributes\MapTo;
use Lodipay\DTO\DTO\TseDTO;
use Lodipay\Qpay\Api\Enum\ObjectType;

class CheckPaymentRequest extends TseDTO
{
    /**
     * Обьектын төрөл
     *    INVOICE: Нэхэмжлэх
     *    QR: QR код
     *    ITEM: Бүтээгдэхүүн
     * Example: INVOICE.
     */
    #[MapTo('object_type')]
    public ObjectType $objectType;
    /**
     * Обьектын ID Обьектын төрөл
     *       INVOICE үед Нэхэмлэхийн код(invoice_code)
     *       Обьектын төрөл QR үед QR кодыг ашиглана
     * Example: 00f94137-66fd-4d90-b2b2-8225c1b4ed2d.
     */
    #[MapTo('object_id')]
    public string $objectId;
    /**
     * Object.
     */
    #[MapTo('offset')]
    public ?Offset $offset;
}
