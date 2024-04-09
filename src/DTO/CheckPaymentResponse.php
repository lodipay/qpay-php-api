<?php

namespace Lodipay\Qpay\Api\DTO;

use Lodipay\DTO\Attributes\MapFrom;
use Lodipay\DTO\DTO\TseDTO;

class CheckPaymentResponse extends TseDTO
{
    /**
     * Нийт гүйлгээний мөрийн тоо.
     * Example: 1.
     */
    public int $count;

    /**
     * Гүйлгээний дүн
     * Example: 100.
     */
    #[MapFrom('paid_amount')]
    public ?float $paidAmount = null;

    /**
     * Гүйлгээний мөр
     *
     * @var array<Payment>
     */
    public array $rows;
}
