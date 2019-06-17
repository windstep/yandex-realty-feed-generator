<?php

namespace Windstep\YRLGenerator\Enums;

use MyCLabs\Enum\Enum;

/**
 * Class Category
 * @package Windstep\YRLGenerator\Enums
 * @method static HOUSE()
 * @method static FLAT()
 * @method static TOWNHOUSE()
 */
class Category extends Enum
{
    private const HOUSE = 'дом';
    private const FLAT = 'квартира';
    private const TOWNHOUSE = 'таунхаус';
}
