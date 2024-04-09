<?php

namespace Lodipay\Qpay\Api\Enum;

enum ObjectType: string
{
    case MERCHANT = 'MERCHANT';
    case INVOICE = 'INVOICE';
    case QR = 'QR';
    case ITEM = 'ITEM';
}
