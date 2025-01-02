<?php

function insertionSort($arr) {
    for ($i = 1, $n = count($arr); $i < $n; $i++) {
        $key = $arr[$i];
        for ($j = $i - 1; $j >= 0 && $arr[$j] > $key; $j--) {
            $arr[$j + 1] = $arr[$j];
        }
        $arr[$j + 1] = $key;
    }
    return $arr;
}

// Example usage
$arr = [64, 34, 25, 12, 22, 11, 90];
$sortedArr = insertionSort($arr);
echo "Sorted array: ";
print_r($sortedArr);

?>
