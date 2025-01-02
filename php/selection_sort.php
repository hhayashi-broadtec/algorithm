<?php

function selectionSort($arr) {
    $n = count($arr);
    for ($i = 0; $i < $n - 1; $i++) {
        $minIndex = $i;
        for ($j = $i + 1; $j < $n; $j++) {
            if ($arr[$j] < $arr[$minIndex]) {
                $minIndex = $j;
            }
        }
        [$arr[$i], $arr[$minIndex]] = [$arr[$minIndex], $arr[$i]];
    }
    return $arr;
}

// Example usage
$arr = [64, 34, 25, 12, 22, 11, 90];
$sortedArr = selectionSort($arr);
echo "Sorted array: ";
print_r($sortedArr);

?>
