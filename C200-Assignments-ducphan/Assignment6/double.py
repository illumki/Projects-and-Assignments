def d1(x):
    tmp = []
    for l in x:
        tmp.append(l)
        tmp.append(l)
    return tmp


def d2(x):
    tmp = []
    for l in range(len(x)):
        tmp.append(x[l])
        tmp.append(x[l])
    return tmp


def w1(x):
    i = 0
    tmp = []
    while i < len(x):
        tmp.append(x[i])
        tmp.append(x[i])
        i += 1
    return tmp


def w2(x):
    i = 0
    tmp = []
    while True:
        if len(tmp) == len(x)*2:
            return tmp
        tmp.append(x[i])
        tmp.append(x[i])
        i += 1
