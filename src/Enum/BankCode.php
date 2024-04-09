<?php

namespace Lodipay\Qpay\Api\Enum;

enum BankCode: string
{
    case BANK_OF_MONGOLIA = '010000';
    case CAPITAL_BANK = '020000';
    case TDB = '040000';
    case KHAN_BANK = '050000';
    case GOLOMT_BANK = '150000';
    case TRANS_BANK = '190000';
    case ARIG_BANK = '210000';
    case CREDIT_BANK = '220000';
    case NIB_BANK = '290000';
    case CAPITRON_BANK = '300000';
    case XAC_BANK = '320000';
    case CHINGISKHAN_BANK = '330000';
    case STATE_BANK = '340000';
    case NATIONAL_DEVELOPMENT_BANK = '360000';
    case BOGD_BANK = '380000';
    case STATE_FUND = '900000';
    case MOBI_FINANCE = '990000';
    case M_BANK = '991000';
    case INVESCORE = '993000';
    case TEST_BANK = '100000';
}
