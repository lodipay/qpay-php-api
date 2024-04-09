<?php

namespace Lodipay\Qpay\Api\Enum;

enum PaymentStatus: string
{
    /* Гүйлгээ үүсгэгдсэн */
    case NEW = 'NEW';
    /* Гүйлгээ амжилтгүй */
    case FAILED = 'FAILED';
    /* Төлөгдсөн */
    case PAID = 'PAID';
    /* Дутуу төлөгдсөн */
    case PARTIAL = 'PARTIAL';
    /* Гүйлгээ буцаагдсан */
    case REFUNDED = 'REFUNDED';
}
