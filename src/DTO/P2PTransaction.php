<?php

namespace Lodipay\Qpay\Api\DTO;

use Lodipay\DTO\Attributes\MapFrom;
use Lodipay\DTO\DTO\TseDTO;
use Lodipay\Qpay\Api\Enum\BankCode;
use Lodipay\Qpay\Api\Enum\Currency;

class P2PTransaction extends TseDTO
{
    /**
     * Гүйлгээг эхлүүлэгч банкны код
     * Example: 50000.
     */
    #[MapFrom('transaction_bank_code')]
    public BankCode $transactionBankCode;
    /**
     * Гүйлгээг эхлүүлэгч банкны код
     * Example: 50000.
     */
    #[MapFrom('account_bank_code')]
    public BankCode $accountBankCode;
    /**
     * Төлбөр хүлээн авагч банкны нэр
     * Example: Хаан банк.
     */
    #[MapFrom('account_bank_name')]
    public string $accountBankName;
    /**
     * Төлбөр хүлээн авагч дансны дугаар
     * Example: 50******.
     */
    #[MapFrom('account_number')]
    public string $accountNumber;
    /**
     * Статус
     * Example: SUCCESS.
     */
    public string $status;
    /**
     * Дансанд орсон төлбөрийн дүн
     * Example: 99.0.
     */
    public float $amount;
    /**
     * Дансанд орсон төлбөрийн валют
     * Example: MNT.
     */
    public Currency $currency;
    /**
     * Дансны гүйлгээний хаалт хийгдсэн эсэх статус /Realtime/
     * Example: SETTLED.
     */
    #[MapFrom('settlement_status')]
    public string $settlementStatus;
}
