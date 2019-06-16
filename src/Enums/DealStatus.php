<?php

namespace Windstep\YRLGenerator\Enums;

use MyCLabs\Enum\Enum;

class DealStatus extends Enum
{
    private const PRIMARY = 'первичная продажа';
    private const DIRECT = 'прямая продажа';
    private const REASSIGNMENT = 'переуступка';
}
