<?php

namespace Lodipay\Qpay\Api\Enum;

enum BaseUrl: string
{
    case PROD = 'https://merchant.qpay.mn/v2/';
    case SANDBOX = 'https://merchant-sandbox.qpay.mn/v2/';
}
