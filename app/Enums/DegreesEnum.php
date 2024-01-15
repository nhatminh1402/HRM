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
    public const THPT = 'THPT';
    public const CAO_DANG = 'CAO ĐẲNG';
    public const DAI_HOC = 'ĐẠI HỌC';
    public const CAO_HOC = 'CAO HỌC';
}
