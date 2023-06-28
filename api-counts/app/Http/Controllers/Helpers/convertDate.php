<?php

function getFromDateAttribute($value)
{
    return \Carbon\Carbon::parse($value)->format('Y-m-d');
}
