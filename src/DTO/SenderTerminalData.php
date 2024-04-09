<?php

namespace Lodipay\Qpay\Api\DTO;

use Lodipay\DTO\DTO\TseDTO;

class SenderTerminalData extends TseDTO
{
    /**
     * Терминалын нэр
     */
    public ?string $name;
}
