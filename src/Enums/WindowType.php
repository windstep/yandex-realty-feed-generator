<?php

namespace Windstep\YRLGenerator\Enums;

use MyCLabs\Enum\Enum;

/**
 * Class WindowType
 * @package Windstep\YRLGenerator\Enums
 * @method static YARD()
 * @method static STREET()
 */
class WindowType extends Enum
{
    private const YARD = 'во двор';
    private const STREET = 'на улицу';
}
