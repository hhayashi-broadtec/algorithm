def insertion_sort(arr)
  arr.each_with_index do |key, i|
    j = i - 1
    j -= 1 while j >= 0 && arr[j] > key
    arr[j + 1] = key
  end
  arr
end

# Example usage
arr = [64, 34, 25, 12, 22, 11, 90]
sorted_arr = insertion_sort(arr)
puts "Sorted array: #{sorted_arr}"
