<?php

function bubbleSort($arr) {
    $n = count($arr);
    for ($i = 0; $i < $n; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($arr[$j] > $arr[$j + 1]) {
                // Swap $arr[$j] and $arr[$j + 1]
                [$arr[$j], $arr[$j + 1]] = [$arr[$j + 1], $arr[$j]];
            }
        }
    }
    return $arr;
}

// Example usage
$arr = [64, 34, 25, 12, 22, 11, 90];
$sortedArr = bubbleSort($arr);
echo "Sorted array: ";
print_r($sortedArr);

?>
