<?php

namespace Windstep\YRLGenerator\Enums;

use MyCLabs\Enum\Enum;

/**
 * Class FloorCovering
 * @package Windstep\YRLGenerator\Enums
 * @method static FITTED_CARPET()
 * @method static LAMINATE()
 * @method static LINOLEUM()
 * @method static PARQUET()
 */
class FloorCovering extends Enum
{
    private const FITTED_CARPET = 'ковролин';
    private const LAMINATE = 'ламинат';
    private const LINOLEUM = 'линолиум';
    private const PARQUET = 'паркет';
}
