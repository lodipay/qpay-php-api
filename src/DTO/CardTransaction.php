<?php

namespace Lodipay\Qpay\Api\DTO;

use Carbon\CarbonImmutable;
use Lodipay\DTO\Attributes\MapFrom;
use Lodipay\DTO\DTO\TseDTO;
use Lodipay\Qpay\Api\Enum\Currency;

class CardTransaction extends TseDTO
{
    /**
     * Картын төрөл
     * Example: UNIONPAY.
     */
    #[MapFrom('card_type')]
    public string $cardType;
    /**
     * Гадаад гүйлгээ зөвшөөрсөн эсэх
     * true: Зөвшөөрсөн
     * false: зөвшөөрөөгүй
     * Example: false.
     */
    #[MapFrom('is_cross_border')]
    public bool $isCrossBorder;
    /**
     * Example: 100.0.
     */
    public float $amount;
    /**
     * Валют
     * Example: MNT.
     */
    public Currency $currency;
    /**
     * Гүйлгээ хийгдсэн хугацаа
     * Example: 2022-03-11T06:23:48.586Z.
     */
    public CarbonImmutable $date;
    /**
     * Статус
     * Example: SUCCESS.
     */
    public string $status;
    /**
     * Картын гүйлгээний хаалт хийгдсэн эсэх статус
     * Example: PENDING.
     */
    #[MapFrom('settlement_status')]
    public string $settlementStatus;
    /**
     * Картын гүйлгээ бичигдсэн хугацаа
     * Example: 2022-03-11T06:23:48.586Z.
     */
    #[MapFrom('settlement_status_date')]
    public CarbonImmutable $settlementStatusDate;
}
