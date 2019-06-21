<?php

namespace Windstep\YRLGenerator\Enums;

use MyCLabs\Enum\Enum;

/**
 * Class Type
 * @package Windstep\YRLGenerator\Enums
 * @method static SELL()
 * @method static RENT()
 */
class Type extends Enum
{
    private const SELL = 'продажа';
    private const RENT = 'аренда';
}
