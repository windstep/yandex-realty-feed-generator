<?php

namespace Windstep\YRLGenerator\Enums;

use MyCLabs\Enum\Enum;

/**
 * Class DealStatus
 * @package Windstep\YRLGenerator\Enums
 * @method static PRIMARY()
 * @method static DIRECT()
 * @method static REASSIGNMENT()
 */
class DealStatus extends Enum
{
    private const PRIMARY = 'первичная продажа';
    private const DIRECT = 'прямая продажа';
    private const REASSIGNMENT = 'переуступка';
}
