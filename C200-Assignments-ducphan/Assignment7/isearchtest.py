import isearch

x1 = [34]
x2 = [34, 42]
x3 = [31, 1, 2, 1, 35, 31]
x4 = [5, 4, 3, 2, 1, 5, 4, 3, 2, 1]

xlst = [x1, x2, x3, x4]

for i in xlst:
    print(isearch.insertionSort(i))
