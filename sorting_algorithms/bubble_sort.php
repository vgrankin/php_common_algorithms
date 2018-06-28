<?php

/**
 * Bubble sort
 * 
 * Usage example:
 * 
 * ```
 * <?php
 * $arr = array(255,1,22,3,45,5);
 * $result = bubbleSort($arr);
 * print_r($result);
 * ```
 * 
 * @param array $arr
 * @return array
 */
function bubbleSort(array $arr)
{
    $n = sizeof($arr);
    for ($i = 1; $i < $n; $i++) {
        for ($j = $n - 1; $j >= $i; $j--) {
            if($arr[$j-1] > $arr[$j]) {
                $tmp = $arr[$j - 1];
                $arr[$j - 1] = $arr[$j];
                $arr[$j] = $tmp;
            }
        }
    }
 
    return $arr;
}

$arr = array(255,1,22,3,45,5);
$result = bubbleSort($arr);
print_r($result);