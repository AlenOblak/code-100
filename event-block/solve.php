<?php

$json = json_decode(file_get_contents("input.txt"));

$len = $json->columns;
$pad = $json->padChar;

echo str_repeat($pad, $len)."\n";
foreach ($json->events as $event) {
    $name = ' '.$event->name.' ';
    if(property_exists($event, 'location'))
        $location = ' '.$event->location.' ';
    else
        $location = '';
    $date = ' '.$event->date.' ';
    if($location != '') {
        $l_pad = floor(($len - strlen($location)) / 2) - strlen($name);
        $r_pad = $len - 2 - $l_pad - strlen($name.$location.$date);
        echo $pad.$name.str_repeat($pad, $l_pad).$location.str_repeat($pad, $r_pad).$date.$pad."\n";
    } else {
        echo $pad.$name.str_repeat($pad, $len - 2 - strlen($name.$date)).$date.$pad."\n";
    }
}
echo str_repeat($pad, $len)."\n";

