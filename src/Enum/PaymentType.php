<?php

namespace Lodipay\Qpay\Api\Enum;

enum PaymentType: string
{
    /* Дансны гүйлгээ */
    case P2P = 'P2P';
    /* Картын гүйлгээ */
    case CARD = 'CARD';
}
