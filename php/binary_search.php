<?php

function binarySearch($arr, $target) {
    $left = 0;
    $right = count($arr) - 1;

    while ($left <= $right) {
        $mid = floor(($left + $right) / 2);
        if ($arr[$mid] === $target) {
            return $mid;
        } elseif ($arr[$mid] < $target) {
            $left = $mid + 1;
        } else {
            $right = $mid - 1;
        }
    }

    return -1;
}

// Example usage:
$arr = [1, 2, 3, 4, 5, 6, 7, 8, 9];
$target = 5;
$result = binarySearch($arr, $target);
echo "Target $target found at index: $result";

?>
