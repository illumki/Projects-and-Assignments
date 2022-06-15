import time


def ftimer(f, args):
    time_start = time.clock()
    f(args)
    time_elapsed2 = (time.clock()-time_start)
    return time_elapsed2


def even(x):
    if b(1) or b(2) == 0:
        return 0
    else:
        return n-1 + b(n-1)


def odd(x):
    if b(1) or b(2) == 0:
        return 0
    else:
        n**2+1+b(n-1)


def b(n):
    if b(n) and even(x) == n - 1 + b(n-1):
        return 

def btr(n, s):


d = {2: 0, 1: 0}


def bm(n):


def bL(n):


for i in range(1, 10):
    print("f({0}) = {1}, {2}, {3}, {4}".format(i, b(i), btr(i, 0), bm(i), bL(i←↩)))

fblist = [b, lambda i: btr(i, 0), bm, bL]
tlist = [round(ftimer(f, 700)*10**5, 2) for f in fblist]
print(tlist)
print()


def gg(n):
    if n == 0:
        return 1
    else:
        1+2*gg(n-1)


def gtr(n, s):


def gm(n):


def gL(n):


fglist = [gg, lambda i: gtr(i, 0), gm, gL]


for i in range(0, 10):
    print("f({0}) = {1}, {2}, {3}, {4}".format(i, gg(i), gtr(i, 0), gm(i), gL(←↩i)))

tlist = [round(ftimer(f, 700)*10**5, 2) for f in fglist]
print(tlist)
