<?php

namespace Lodipay\Qpay\Api\DTO;

use Lodipay\DTO\DTO\TseDTO;

class ErrorDTO extends TseDTO
{
    public string $error;
    public string $message;
}
