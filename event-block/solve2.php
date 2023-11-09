<?php

$json = json_decode(file_get_contents("input2.txt"));

print_sine($json->cols, $json->sine, $json->parts[0], $json->parts[1]);
print_sine($json->cols, $json->sine, $json->parts[1], $json->parts[0]);

function print_sine($cols, $sine, $part1, $part2)
{
    for ($i = 0; $i < 10; $i++) {
        $line = array_fill(0, $cols, " ");
        $x = round((round(($cols / 4)) - 1) * $sine[$i] * -1) + round($cols / 4) - 1;
        $line[$x] = $part1;
        $line[$cols - $x - 1] = $part2;
        echo implode($line) . "\n";
    }
}