<?php

namespace Tsetsee\Qpay\Api\Exception;

use Tsetsee\Qpay\Api\DTO\ErrorDTO;

class BadResponseException extends \Exception
{
    public function __construct(public ErrorDTO $error, ?\Throwable $throwable = null)
    {
        $message = json_encode($error->toArray());

        if (false === $message) {
            $message = 'uknown error';
        }
        parent::__construct($message, 0, $throwable);
    }
}
