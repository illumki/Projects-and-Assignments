import math


def makeProbability(xlst):
    tmp = []
    d = {}
    for p in xlst:
        if p not in d:
            d[p] = 1
        else:
            d[p] += 1
    for m in d:
        tmp.append(d.get(m) / len(xlst))
    return tmp


def entropy(xlst):
    sum = 0
    for e in xlst:
        sum += e*math.log2(e)
        
    return round(-sum, 2)


