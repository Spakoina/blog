<?php

// Function for dates format
function format_date($date) {
    $oldLocale = setlocale(LC_TIME, 'it_IT');
    setlocale(LC_TIME, $oldLocale);
    $newDate = utf8_encode(strftime("%A %d %B %Y", $date));
    return ucfirst($newDate);
}