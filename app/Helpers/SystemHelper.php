<?php

use Carbon\Carbon;

function getDatePeriods($monthstart = null, $yearstart = null, $monthend = null, $yearend = null) {
    $output = [];
    $time   = strtotime($yearstart."-".$monthstart);
    $last   = date('m-Y', strtotime($yearend."-".$monthend));
    do {
        $month = date('m-Y', $time);
        $output[] =  $month;
        $time = strtotime('+1 month', $time);
    }
    while ($month != $last);
    return $output;
}
