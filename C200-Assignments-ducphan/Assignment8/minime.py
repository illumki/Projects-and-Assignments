def min(x, y):
    if y < x:
        return y
    else:
        return x


def MIN(lst):
    if len(lst) == 1:
        return lst[0]
    else:
        return min(lst[0], MIN(lst[1:]))


def min1(x):
    lil = x[0]
    for i in range(1, len(x)):
        if x[i] < lil:
            lil = x[i]
        return lil


def min2(x):
    lil = x[0]
    for i in x[1:]:
        if i < lil:
            lil = i
    return lil


def min3(x):
    lil = x[0]
    i = 0
    while (i < len(x)):
        if x[i] < lil:
            lil = x[i]
        i = i + 1
    return lil


def min4(x):
    lil = x[0]
    p = x[1:]
    while p:
        if p[0] < lil:
            lil = p[0]
        p = p[1:]
    return lil


def min5(x):
    lil = x[-1]
    for i in range(len(x)-1, -1, -1):
        if x[i] < lil:
            lil = x[i]
        return lil


x = [1, 42, -1, 22, 0, 12]
mf = [MIN, min1, min2, min3, min4, min5]
for f in mf:
    print("{0}({1}) = {2}".format(f.__name__, x, f(x)))
