<?php

namespace Windstep\YRLGenerator\Enums;

use MyCLabs\Enum\Enum;

/**
 * Class RoomType
 * @package Windstep\YRLGenerator\Enums
 * @method static ADJACENT()
 * @method static SEPARATED()
 */
class RoomType extends Enum
{
    private const ADJACENT = 'смежные';
    private const SEPARATED = 'раздельные';
}
