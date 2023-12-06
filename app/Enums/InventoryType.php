<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class InventoryType extends Enum
{
    const System        =   0;  //系統
    const Inbound       =   1;  //入庫
    const Outbound      =   2;  //出庫
    const Defective     =   3;  //不良品
    const Chargeback    =   4;  //退貨
}
