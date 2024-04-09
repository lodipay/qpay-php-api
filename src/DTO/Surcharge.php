<?php

namespace Lodipay\Qpay\Api\DTO;

use Lodipay\DTO\Attributes\MapTo;
use Lodipay\DTO\DTO\TseDTO;

class Surcharge extends TseDTO
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
     * Байгууллагын дотоод нэмэлт төлбөрийн код
     * Example: Surcharge_01.
     */
    #[MapTo('surcharge_code')]
    public ?string $surchargeCode;
    /**
     * Тэмдэглэл.
     */
    public ?string $note;
}
