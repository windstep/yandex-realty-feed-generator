<?php

namespace Windstep\YRLGenerator\Enums;

use MyCLabs\Enum\Enum;

/**
 * Class BalconyType
 * @package Windstep\YRLGenerator\Enums
 * @method static BALCONY()
 * @method static LOGGIA()
 * @method static BALCONIES()
 * @method static LOGGIAS()
 */
class BalconyType extends Enum
{
    private const BALCONY = 'балкон';
    private const LOGGIA = 'лоджия';
    private const BALCONIES = 'балкона';
    private const LOGGIAS = 'лоджии';
}
