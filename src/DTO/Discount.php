<?php

namespace Lodipay\Qpay\Api\DTO;

use Lodipay\DTO\Attributes\MapTo;
use Lodipay\DTO\DTO\TseDTO;

class Discount extends TseDTO
{
    /**
     * Утга
     * Example: Хүргэлтийн зардал.
     */
    public string $description;
    /**
     * Дүн
     * Example: 100.
     */
    public float $amount;
    /**
     * Байгууллагын дотоод хөнгөлөлтийн код
     * Example: Discount_01.
     */
    #[MapTo('discount_code')]
    public ?string $discountCode;
    /**
     * Тэмдэглэл.
     */
    public ?string $note;
}
