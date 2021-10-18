<?php
function date_long($date, $separator)
{
    $date_split = str_split($date, 2);
    return '20' .
        $date_split[3] .
        $separator .
        $date_split[1] .
        $separator .
        $date_split[0];
}

function date_short($date, $locale)
{
    $date_split = explode('/', $date);

    if ($locale === 'en') {
        $separator = '/';
        $date_formatted =
            $date_split[1] . $separator . $date_split[2] . $separator;
    } else {
        $separator = '.';
        $date_formatted =
            $date_split[2] . $separator . $date_split[1] . $separator;
    }

    return $date_formatted;
}

function time_short($time)
{
    $time_split = explode(':', $time);
    return $time_split[0] . ':' . $time_split[1];
}

function time_long($time, $separator)
{
    $time_split = str_split($time, 2);
    return $time_split[0] . $separator . $time_split[1] . $separator . '00';
}
