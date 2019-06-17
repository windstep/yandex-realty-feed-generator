<?php

namespace Windstep\YRLGenerator\Enums;

use MyCLabs\Enum\Enum;

class BuildingState extends Enum
{
    private const BUILT = 'built'; // построен, не сдан
    private const HAND_OVER = 'hand-over'; // сдан
    private const UNFINISHED = 'unfinished'; // строится
}
