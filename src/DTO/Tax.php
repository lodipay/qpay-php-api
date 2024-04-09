<?php

namespace Lodipay\Qpay\Api\DTO;

use Lodipay\DTO\Attributes\MapTo;
use Lodipay\DTO\DTO\TseDTO;
use Lodipay\Qpay\Api\Enum\TaxCode;

class Tax extends TseDTO
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
     * Татварын код
     * Example: VAT.
     */
    #[MapTo('tax_code')]
    public ?TaxCode $taxCode;
    /**
     * Тэмдэглэл.
     */
    #[MapTo('city_tax')]
    public ?float $cityTax;
    /**
     * Тэмдэглэл.
     */
    public ?string $note;
}
