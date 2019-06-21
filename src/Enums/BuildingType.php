<?php

namespace Windstep\YRLGenerator\Enums;

use MyCLabs\Enum\Enum;

/**
 * Class BuildingType
 * @package Windstep\YRLGenerator\Enums
 * @method static BRICK()
 * @method static MONOLITH()
 * @method static PANEL()
 * @method static MONOLITH_BRICK()
 * @method static WOOD()
 * @method static BLOCK()
 */
class BuildingType extends Enum
{
    private const BRICK = 'кирпичный';
    private const MONOLITH = 'монолит';
    private const PANEL = 'панельный';
    private const MONOLITH_BRICK = 'кирпично-монолитный';
    private const WOOD = 'деревянный';
    private const BLOCK = 'блочный';
}
