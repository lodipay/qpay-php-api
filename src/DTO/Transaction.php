<?php

namespace Lodipay\Qpay\Api\DTO;

use Lodipay\DTO\DTO\TseDTO;

class Transaction extends TseDTO
{
    /**
     * Гүйлгээний утга
     * Example: Тест төлбөр
     */
    public string $description;
    /**
     * Мөнгөн дүн
     * Example: 100.
     */
    public float $amount;
    /**
     * Банкны данс
     *
     * @var ?array<Account>
     */
    public ?array $accounts;
}
