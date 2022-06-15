import numpy as np
a = np.zeros ((4,4),dtype = float)
a[0] = [0,1,1,1]
a[1] = [0,0,0,1]
a[2] = [1,0,0,0]
a[3] = [1,1,0,0]

def pr(A,k):
    for i in range(0,len(A)):
        sum = 0
        for x in range (0,len(A[i])):
            sum += A[i][x]
        for x in range(0,len(A[i])):
            if(not(sum<=0)):
                A[i][x] = (A[i][x])/sum
    P = np.transpose(A)
    L = [.25, .25, .25, .25]

    W = P
    for i in range(0, k):
        W = W.dot(P)
    PL = W.dot(L)
    return PL

print(pr(a,8))