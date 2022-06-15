import random as rn


def twoMax(xlst):
    def mymax(x, y):
        return x if x > y else y
    if len(xlst) == 0:
        return []
    else:
        return [mymax(xlst[0])] + twoMax(xlst[1:])


testlst = rn.randint(0, 10)
lst = []

while testlst:
    lst.append([rn.randint(0, 20), rn.randint(0, 20)])
    testlst -= 1

print(lst)
answer = twoMax(lst)
print(answer)
