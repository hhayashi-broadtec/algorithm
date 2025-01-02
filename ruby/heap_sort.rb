def heapify(arr, n, i)
  largest = i
  left = 2 * i + 1
  right = 2 * i + 2

  if left < n && arr[i] < arr[left]
    largest = left
  end

  if right < n && arr[largest] < arr[right]
    largest = right
  end

  if largest != i
    arr[i], arr[largest] = arr[largest], arr[i]
    heapify(arr, n, largest)
  end
end

def heap_sort(arr)
  n = arr.length

  for i in (n / 2 - 1).downto(0)
    heapify(arr, n, i)
  end

  for i in (n - 1).downto(1)
    arr[i], arr[0] = arr[0], arr[i]
    heapify(arr, i, 0)
  end

  arr
end

# Example usage
arr = [64, 34, 25, 12, 22, 11, 90]
sorted_arr = heap_sort(arr)
puts "Sorted array: #{sorted_arr}"
