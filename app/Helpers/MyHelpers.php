<?php

namespace App\Helpers;

use Carbon\Carbon;

class MyHelpers
{
    public static function getFormattedDateAttribute($value, $format = 'm/d/Y'): string
    {
        return Carbon::createFromFormat('Y-m-d', $value)->format($format);
    }
}
