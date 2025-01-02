def quick_sort(arr)
  return arr if arr.length <= 1

  pivot = arr[arr.length / 2]
  left = arr.select { |x| x < pivot }
  middle = arr.select { |x| x == pivot }
  right = arr.select { |x| x > pivot }

  quick_sort(left) + middle + quick_sort(right)
end

# Example usage
arr = [64, 34, 25, 12, 22, 11, 90]
sorted_arr = quick_sort(arr)
puts "Sorted array: #{sorted_arr}"
