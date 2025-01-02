def merge_sort(arr)
  return arr if arr.length <= 1

  middle = arr.length / 2
  left = arr[0...middle]
  right = arr[middle..-1]

  merge(merge_sort(left), merge_sort(right))
end

def merge(left, right)
  result = []
  left_index = 0
  right_index = 0

  while left_index < left.length && right_index < right.length
    if left[left_index] < right[right_index]
      result << left[left_index]
      left_index += 1
    else
      result << right[right_index]
      right_index += 1
    end
  end

  result.concat(left[left_index..-1])
  result.concat(right[right_index..-1])

  result
end

# Example usage
arr = [64, 34, 25, 12, 22, 11, 90]
sorted_arr = merge_sort(arr)
puts "Sorted array: #{sorted_arr}"
