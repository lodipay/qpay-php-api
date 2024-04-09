<?php

namespace Lodipay\Qpay\Api\DTO;

use Carbon\CarbonImmutable;
use Lodipay\DTO\Attributes\MapFrom;
use Lodipay\DTO\DTO\TseDTO;
use Lodipay\Qpay\Api\Enum\Currency;
use Lodipay\Qpay\Api\Enum\ObjectType;
use Lodipay\Qpay\Api\Enum\PaymentStatus;
use Lodipay\Qpay\Api\Enum\PaymentType;
use Lodipay\Qpay\Api\Enum\TransactionType;

class Payment extends TseDTO
{
    /**
     * QPay-ээс үүссэн гүйлгээний дугаар
     * Example: 493622150113497, 8e25b4d5-fe5a-4d0f-b050-def68a82aaad.
     */
    #[MapFrom('payment_id')]
    public string $payment_id;
    /**
     * Гүйлгээ төлөв
     * NEW: Гүйлгээ үүсгэгдсэн
     * FAILED: Гүйлгээ амжилтгүй
     * PAID: Төлөгдсөн
     * PARTIAL: Дутуу төлөгдсөн
     * REFUNDED: Гүйлгээ буцаагдсан
     * Example: PAID.
     */
    #[MapFrom('payment_status')]
    public PaymentStatus $paymentStatus;
    /**
     * Гүйлгээний нийт дүн
     * Example: 100.0.
     */
    #[MapFrom('payment_amount')]
    public float $paymentAmount;
    /**
     * Гүйлгээний шимтгэлийн дүн
     * Example: 100.0.
     */
    #[MapFrom('trx_fee')]
    public ?float $trxFee;
    /**
     * Гүйлгээний шимтгэлийн дүн
     * Example: 100.0.
     */
    #[MapFrom('payment_fee')]
    public ?float $paymentFee;
    /**
     * Гүйлгээний валют
     * Example: MNT.
     */
    #[MapFrom('payment_currency')]
    public Currency $paymentCurrency;
    /**
     * Гүйлгээ хийгдсэн хугацаа
     * Example: null.
     */
    #[MapFrom('payment_date')]
    public ?CarbonImmutable $paymentDate;
    /**
     * Гүйлгээ хийгдсэн воллет, апп
     * Example: Хаан банк апп
     */
    #[MapFrom('payment_wallet')]
    public string $paymentWallet;
    /**
     * Гүйлгээний төрөл
     * Example: P2P.
     */
    #[MapFrom('payment_type')]
    public ?PaymentType $paymentType;
    /**
     * Гүйлгээний төрөл
     * Example: P2P.
     */
    #[MapFrom('transaction_type')]
    public ?TransactionType $transactionType;
    /**
     * Example: INVOICE.
     */
    #[MapFrom('object_type')]
    public ?ObjectType $objectType;
    /**
     * Example: d50f49f2-9032-4a74-8929-530531f28f63.
     */
    #[MapFrom('object_id')]
    public ?string $objectId;
    /**
     * Subscription payment холболт хийгдсэн үед ажиллана
     * Example: null.
     */
    #[MapFrom('next_payment_date')]
    public ?CarbonImmutable $nextPaymentDate;
    /**
     * Subscription payment холболт хийгдсэн үед ажиллана
     * Example: null.
     */
    #[MapFrom('next_payment_datetime')]
    public ?CarbonImmutable $nextPaymentDateTime;
    /**
     * Wallet буюу картын гүйлгээ хүлээн авах үед ирнэ
     * Example:   {
     *                "card_type": "UNIONPAY",
     *                "is_cross_border": false,
     *                "amount": "100.00",
     *                "currency": "MNT",
     *                "date": "2022-03-11T06:23:48.586Z",
     *                "status": "SUCCESS",
     *                "settlement_status": "PENDING",
     *                "settlement_status_date": "2022-03-11T06:23:48.587Z"
     *            }.
     *
     * @var array<CardTransaction>
     */
    #[MapFrom('card_transactions')]
    public array $cardTransactions;
    /**
     * Дансны буюу банкны апп-аар гүйлгээ хүлээн авах үед ирнэ
     * Example:
     *  {
     *       "transaction_bank_code": "050000",
     *       "account_bank_code": "050000",
     *       "account_bank_name": "Хаан банк",
     *       "account_number": "50*******",
     *       "status": "SUCCESS",
     *       "amount": "99.00",
     *       "currency": "MNT",
     *       "settlement_status": "SETTLED"
     *   }.
     *
     * @var array<P2PTransaction>
     */
    #[MapFrom('p2p_transactions')]
    public array $p2pTransactions;
}
