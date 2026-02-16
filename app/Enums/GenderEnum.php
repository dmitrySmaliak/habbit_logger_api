<?php

namespace App\Enums;

use App\Enums\Concerns\HasValues;

enum GenderEnum: string
{
    use HasValues;

    case Male = 'male';
    case Female = 'female';
}
