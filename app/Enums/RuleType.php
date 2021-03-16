<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class RuleType extends Enum
{
    const Contains = 'pages that contains';
    const Specific = 'a specific page';
    const StartsWith = 'pages start with';
    const EndsWith = 'pages ending with';
}
