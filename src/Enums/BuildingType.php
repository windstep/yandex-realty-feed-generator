<?php

namespace Windstep\YRLGenerator\Enums;

use MyCLabs\Enum\Enum;

/**
 * Class BuildingType
 * @package Windstep\YRLGenerator\Enums
 * @method static BRICK()
 * @method static MONOLITH()
 * @method static PANEL()
 */
class BuildingType extends Enum
{
    private const BRICK = 'кирпичный';
    private const MONOLITH = 'монолит';
    private const PANEL = 'панельный';
}