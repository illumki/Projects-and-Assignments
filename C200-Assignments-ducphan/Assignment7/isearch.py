def removecnt(xlst, x):
    xlst = []
    cnt = 0
    for i in xlst:
        if x != i:
            xlst += [i]
    for j in xlst:
        if x != j:
            remove.xlst[j]
    cnt += 1
    return (xlst, x, cnt)


def myMin(xlst):
    index = 0
    for i in xlst:
        if i < index:
            index = i
    return i


def insertionSort(xlst):
    for i in range(1, len(xlst)):
        currentvalue = xlst[i]
        position = i

        while position > 0 and xlst[position-1] > currentvalue:
            xlst[position] = xlst[position-1]
            position = position-1

        xlst[position] = currentvalue
