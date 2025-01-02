<?php

function mergeSort($arr) {
    if (count($arr) <= 1) return $arr;

    $middle = floor(count($arr) / 2);
    $left = array_slice($arr, 0, $middle);
    $right = array_slice($arr, $middle);

    return merge(mergeSort($left), mergeSort($right));
}

function merge($left, $right) {
    $result = [];
    $leftIndex = $rightIndex = 0;

    while ($leftIndex < count($left) && $rightIndex < count($right)) {
        if ($left[$leftIndex] < $right[$rightIndex]) {
            $result[] = $left[$leftIndex++];
        } else {
            $result[] = $right[$rightIndex++];
        }
    }

    return array_merge($result, array_slice($left, $leftIndex), array_slice($right, $rightIndex));
}

// Example usage
$arr = [64, 34, 25, 12, 22, 11, 90];
$sortedArr = mergeSort($arr);
echo "Sorted array: ";
print_r($sortedArr);

?>
