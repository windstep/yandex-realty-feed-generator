<?php

namespace Windstep\YRLGenerator\Enums;

use MyCLabs\Enum\Enum;

/**
 * Class Currency
 * @package Windstep\YRLGenerator\Enums
 * @method static RUB()
 * @method static EUR()
 * @method static USD()
 */
class Currency extends Enum
{
    private const RUB = 'RUB';
    private const EUR = 'EUR';
    private const USD = 'USD';
}