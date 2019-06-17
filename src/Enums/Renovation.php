<?php

namespace Windstep\YRLGenerator\Enums;

use MyCLabs\Enum\Enum;

/**
 * Class Renovation
 * @package Windstep\YRLGenerator\Enums
 * @method static FINAL_FINISHING()
 * @method static ABSOLUTELY_READY()
 * @method static ROUGH_FINISHING()
 */
class Renovation extends Enum
{
    private const FINAL_FINISHING = 'чистовая отделка';
    private const ABSOLUTELY_READY = 'под ключ';
    private const ROUGH_FINISHING = 'черновая отделка';
}
