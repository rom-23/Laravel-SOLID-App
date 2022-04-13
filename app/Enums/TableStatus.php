<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * Class TableStatus
 * @package App\Enums
 */
final class TableStatus extends Enum
{
    /**
     *
     */
    public const Pending =   'Pending';
    /**
     *
     */
    public const Available =   'Available';
    /**
     *
     */
    public const Unvaliable = 'Unvaliable';
}
