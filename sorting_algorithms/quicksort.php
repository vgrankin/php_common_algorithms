<?php

/**
 * Quick sort
 * 
 * Usage example:
 * 
 * ```
 * <?php
 * $arr = array(20,12,4,13,5);
 * $result = quicksort($arr, 0, (sizeof($arr)-1));
 * print_r($result);
 * ```
 * 
 * @param array $arr
 * @return array
 */
function quicksort(array $arr, $left, $right)
{
    $i = $left;
    $j = $right;
    $separator = $arr[floor(($left + $right) / 2)];

    while ($i <= $j) {
        while ($arr[$i] < $separator) {
            $i++;
        }

        while($arr[$j] > $separator) {
            $j--;
        }

        if ($i <= $j) {
            $tmp = $arr[$i];
            $arr[$i] = $arr[$j];
            $arr[$j] = $tmp;
            $i++;
            $j--;
        }
    }

    if ($left < $j) {
        $arr = quicksort($arr, $left, $j);
    }

    if ($right > $i) {
        $arr = quicksort($arr, $i, $right);
    }

    return $arr;
}

// Example:
$arr = array(20,12,4,13,5);
$result = quicksort($arr, 0, (sizeof($arr)-1));
print_r($result);
