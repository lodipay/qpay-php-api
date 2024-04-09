<?php

namespace Lodipay\Qpay\Api\DTO;

use Lodipay\DTO\Attributes\MapTo;
use Lodipay\DTO\DTO\TseDTO;

class Offset extends TseDTO
{
    /**
     * Хуудасны тоо
     * Example: 1.
     */
    #[MapTo('page_number')]
    public int $pageNumber;
    /**
     * Хуудасны хязгаар
     * Example: 100.
     */
    #[MapTo('page_limit')]
    public int $pageLimit;
}
