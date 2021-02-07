<?php

use Kmlpandey77\Label\Facades\Label;

if (!function_exists('label'))
{
    function label($labelId)
    {
        return Label::get($labelId);
    }
}
