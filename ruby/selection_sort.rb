def selection_sort(arr)
  n = arr.length
  (0...n).each do |i|
    min_index = (i+1...n).each_with_index.min[1] + i + 1
    arr[i], arr[min_index] = arr[min_index], arr[i] if arr[i] > arr[min_index]
  end
  arr
end

# Example usage
arr = [64, 34, 25, 12, 22, 11, 90]
sorted_arr = selection_sort(arr)
puts "Sorted array: #{sorted_arr}"
