<?php

function dateToDbFormat($date)
{
    return $date ? date('Y-m-d', strtotime($date)) : $date;
}
