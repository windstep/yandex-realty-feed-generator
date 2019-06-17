<?php

namespace Windstep\YRLGenerator\Enums;

use MyCLabs\Enum\Enum;

/**
 * Class BuildingState
 * @package Windstep\YRLGenerator\Enums
 * @method static BUILT()
 * @method static HAND_OVER()
 * @method static UNFINISHED()
 */
class BuildingState extends Enum
{
    private const BUILT = 'built'; // построен, не сдан
    private const HAND_OVER = 'hand-over'; // сдан
    private const UNFINISHED = 'unfinished'; // строится
}
