def maxFor(x):
    index = 0
    for i in x:
        if i > index:
            index = i
    return i


def minFor(x):
    index = 0
    for i in x:
        if i < index:
            index = i
    return i


def myRemove(x, lst):
    index = []
    for i in lst:
        if x != i:
            index += [i]
    return index


def myReplace(oldX, newX, lst):
        Index = []
    for  in range(len(lst)): 
        if lst[i] == oldX:
            index += [newX]
        else:
            index += [lst[i]]
    return index


def myLeftMerge(x, y):
    index = []
    for i in range(len(x)):
        index +=  [x[i]]+[y[i]]
    return index

def listProducts(x):
    index = 1
    for i in range(len(x)):
        p *= x[i]
    return p


def removeString(x):
    index = []
    for y in x: 
        if y != str(y):
            index += [y]
    return index


def removeVowels(x):
     result = ""
    for y in x:
        if y != ['a','e','i','o','u']:
            result += str(y)
    return result


x = [1, 42, 24, 22, 61, 100, 0, 42]
y = [2]
z = [555, 333, 222]
nlst = [x, y, z]
c = [0, 1, 1, 0, 2, 1, 4]
a = ["a", "b", "b", "a", "c", "b", "e"]
b = [1, 1, 2, 1, 1, 2, 1, 1, 2, 1, 3, 1]

for i in nlst:
    print(minFor(i))
    print(maxFor(i))

print(myRemove("a", a))
print(myRemove("b", a))
