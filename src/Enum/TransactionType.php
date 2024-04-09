<?php

namespace Lodipay\Qpay\Api\Enum;

enum TransactionType: string
{
    /* Дансны гүйлгээ */
    case P2P = 'P2P';
    /* Картын гүйлгээ */
    case CARD = 'CARD';
}
