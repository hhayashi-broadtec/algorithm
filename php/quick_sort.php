<?php

function quickSort($arr) {
    if (count($arr) < 2) return $arr;
    
    $left = $right = [];
    $pivot = array_shift($arr);
    
    foreach ($arr as $v) {
        if ($v < $pivot) $left[] = $v;
        else $right[] = $v;
    }
    
    return array_merge(quickSort($left), [$pivot], quickSort($right));
}

// Example usage
$arr = [64, 34, 25, 12, 22, 11, 90];
$sortedArr = quickSort($arr);
echo "Sorted array: ";
print_r($sortedArr);

?>
