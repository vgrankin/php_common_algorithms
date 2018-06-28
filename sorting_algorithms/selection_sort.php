<?php

/**
 * Selection sort
 * 
 * Usage example:
 * 
 * ```
 * <?php
 * $arr = array(255,1,22,3,45,5);
 * $result = selectionSort($arr);
 * print_r($result);
 * ```
 * 
 * @param array $arr
 * @return array
 */
function selectionSort(array $arr)
{
    $n = sizeof($arr);
    for ($i = 0; $i < $n; $i++) {
        $lowestValueIndex = $i;
        $lowestValue = $arr[$i];
        for ($j = $i + 1; $j < $n; $j++) {
            if ($arr[$j] > $lowestValue) {
                $lowestValueIndex = $j;
                $lowestValue = $arr[$j];
            }
        }

        $arr[$lowestValueIndex] = $arr[$i];
        $arr[$i] = $lowestValue;
    }

    return $arr;
}

// Example:
$arr = array(255,1,22,3,45,5);
$result = selectionSort($arr);
print_r($result);
