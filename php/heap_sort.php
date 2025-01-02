<?php

function heapify(&$arr, $n, $i) {
    $largest = $i;
    $left = 2 * $i + 1;
    $right = 2 * $i + 2;

    if ($left < $n && $arr[$left] > $arr[$largest]) {
        $largest = $left;
    }

    if ($right < $n && $arr[$right] > $arr[$largest]) {
        $largest = $right;
    }

    if ($largest != $i) {
        [$arr[$i], $arr[$largest]] = [$arr[$largest], $arr[$i]];
        heapify($arr, $n, $largest);
    }
}

function heapSort($arr) {
    $n = count($arr);

    for ($i = floor($n / 2) - 1; $i >= 0; $i--) {
        heapify($arr, $n, $i);
    }

    for ($i = $n - 1; $i > 0; $i--) {
        [$arr[0], $arr[$i]] = [$arr[$i], $arr[0]];
        heapify($arr, $i, 0);
    }

    return $arr;
}

// Example usage
$arr = [64, 34, 25, 12, 22, 11, 90];
$sortedArr = heapSort($arr);
echo "Sorted array: ";
print_r($sortedArr);

?>
