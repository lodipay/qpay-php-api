<?php

namespace Lodipay\Qpay\Api\DTO;

use Lodipay\DTO\DTO\TseDTO;

class Url extends TseDTO
{
    /**
     * Банкны нэр
     * Example:	Trade and Development bank.
     */
    public string $name;
    /**
     * Тайлбар
     * Example: TDB online.
     */
    public string $description;
    /**
     * Банкны лого
     * Example: https://qpay.mn/q/logo/khanbank.png".
     */
    public string $logo;
    /**
     * Тухайн банкны апп дуудагдах линк
     * Example: tdbbank://q?qPay_QRcode=0002010102121531279404962794049600000000KKTQPAY52046010530349654031005802MN5913TEST_MERCHANT6011Ulaanbaatar6244010712345670504test0721G7ZEWdbzkppBhJ1nouBhZ6304879D.
     */
    public string $link;
}
