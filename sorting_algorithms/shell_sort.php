<?php

/**
 * Shell sort
 * 
 * Usage example:
 * 
 * ```
 * <?php
 * $arr = array(20,12,67,34,4,19,40,75,55,82,5,41,13,25,71);
 * $result = shellsort($arr);
 * print_r($result);
 * ```
 * 
 * @param array $arr
 * @return array
 */
function shellsort(array $arr)
{
    $n = sizeof($arr);
    $t = ceil(log($n, 2));
    $d[1] = 1;
    for ($i = 2; $i <= $t; $i++) {
        $d[$i] = 2 * $d[$i - 1] + 1;
    }

    $d = array_reverse($d);
    foreach ($d as $curIncrement) {
        for ($i = $curIncrement; $i < $n; $i++) {
            $x = $arr[$i];
            $j = $i - $curIncrement;
            while ($j >= 0 && $x < $arr[$j]) {
                $arr[$j + $curIncrement] = $arr[$j];
                $j = $j - $curIncrement;
            }
            $arr[$j + $curIncrement] = $x;
        }
    }

    return $arr;
}

// Example:
$arr = array(20,12,67,34,4,19,40,75,55,82,5,41,13,25,71);
$result = shellsort($arr);
print_r($result);

