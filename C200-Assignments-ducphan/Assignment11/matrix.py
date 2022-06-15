import numpy as np 
def mm(a,b):
    aI, aJ = a.shape
    bI, bJ = b.shape
    total = np.zeros((aI, bJ))
    for i in range ( len(a)):
        for j in (b[0]):
            for k in range(len(b)):
                total[i][j] += int(a[i][k])
    return total

def sm(n,a):
    aI, aJ = a.shape
    bI, bJ = b.shape
    total = np.zeros((aI, bJ))
    return total

    for i in range(len(aI)):
        for j in range(bI):
            total[i][j] += n * a[i][j]
    return total

def tp(a):
    total = np.empty((len(a[0]), len(a)))
    for j in range (len(a[0])):
        for i in range (len(a)):
            total[j][i] = a[i][j]
    return total

def add_m(a,b):
    aI, aJ = a.shape
    bI, bJ = b.shape
    total = np.zeros((aI, aJ))
    for i in range(len(a)):
        for j in range(len(a)):
            total[i][j] = a[i][j] + b[i][j]
    return total

a = np.array([[1,2,4],[3,4,3]])
b = np.array([[-1,0],[1,-5],[-3,1]])
print("numpy product\n", np.dot(a,b))
d = mm(a,b)
print(d)

print("numpy scalar product\n", 4*a)
e = sm(4,a)
print(e)

print("numpy tranpose\n", np.transpose(a))
f = tp(a)

print("numpy addition\n", a + a)
g = add_m(a,a)
print(g)
