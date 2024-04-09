<?php

namespace Lodipay\Qpay\Api\DTO;

use Lodipay\DTO\DTO\TseDTO;

class SenderBranchData extends TseDTO
{
    /**
     * Салбарын регистр
     * Example: 12121232.
     */
    public ?string $register;
    /**
     * Салбарын нэр
     * Example: Баянзүрх салбар
     */
    public ?string $name;
    /**
     * Салбарын email
     * Example: sample@info.mn.
     */
    public ?string $email;
    /**
     * Салбарын утаc
     * Example: 99119911.
     */
    public ?string $phone;
    /**
     * Салбарын хаяг.
     */
    public ?Address $address;
}
