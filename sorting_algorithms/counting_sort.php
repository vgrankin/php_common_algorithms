<?php

/**
 * Counting sort
 * 
 * Usage example:
 * 
 * ```
 * <?php
 * $arr = array(255,1,22,3,45,5);
 * $result = countingSort($arr);
 * print_r($result);
 * ```
 * 
 * @param array $arr
 * @return array
 */
function countingSort(array $arr)
{
    $n = sizeof($arr);
    $p = array();
    $sorted = array();

    for ($i = 0; $i < $n; $i++) {
        $p[$i] = 0;
    }

    for ($i = 0; $i < $n; $i++) {
        for ($j = $i + 1; $j < $n; $j++) {
            if ($arr[$i] > $arr[$j]) {
                $p[$i]++;
            } else {
                $p[$j]++;
            }
        }
    }        

    for ($i = 0; $i < $n; $i++) {
        $sorted[$p[$i]] = $arr[$i];
    }

    return $sorted;
}

$arr = array(255,1,22,3,45,5);
$result = countingSort($arr);
print_r($result);