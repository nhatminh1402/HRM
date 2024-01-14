<?php

declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class DegreesEnum extends Enum
{
    public const THPT = 0;
    public const CAO_DANG = 1;
    public const DAI_HOC = 2;
    public const CAO_HOC = 3;
}
