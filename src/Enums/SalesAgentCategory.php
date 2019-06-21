<?php

namespace Windstep\YRLGenerator\Enums;

use MyCLabs\Enum\Enum;

/**
 * Class SalesAgentCategory
 * @package Windstep\YRLGenerator\Enums
 * @method static AGENCY()
 * @method static DEVELOPER()
 * @method static OWNER()
 */
class SalesAgentCategory extends Enum
{
    private const AGENCY = 'агентство';
    private const DEVELOPER = 'застройщик';
    private const OWNER = 'владелец';
}
