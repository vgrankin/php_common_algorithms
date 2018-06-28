<?php

/**
 * Bubble sort improved
 * 
 * Usage example:
 * 
 * ```
 * <?php
 * $arr = array(255,1,22,3,45,5);
 * $result = bubbleSortImproved($arr);
 * print_r($result);
 * ```
 * 
 * @param array $arr
 * @return array
 */
function bubbleSortImproved(array $arr)
{
    $n = sizeof($arr);
    for ($i = 1; $i < $n; $i++) {
        $flag = false;
        for ($j = $n - 1; $j >= $i; $j--) {
            if($arr[$j-1] > $arr[$j]) {
                $tmp = $arr[$j - 1];
                $arr[$j - 1] = $arr[$j];
                $arr[$j] = $tmp;
                $flag = true;
            }
        }
        if (!$flag) {
            break;
        }
    }

    return $arr;
}

// Example:
$arr = array(255,1,22,3,45,5);
$result = bubbleSortImproved($arr);
print_r($result);