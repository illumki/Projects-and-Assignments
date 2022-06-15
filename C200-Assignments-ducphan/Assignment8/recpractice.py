def s(n):
    if n == 0:
        return 0
    else:
        return s(n-1)+n
    return 1


def s1(n):
    if n == 0:
        return 0
    else:
        return n*(n+1)/2
    return 1


def p(n):
    if n == 10000:
        return 0
    else:
        return p(n-1)+0.02*p(n-1)
    return 1


def p1(n):
    if n == 10000:
        return 0
    else:
        return (1.02**n)*10000
    return 1


def b(n):
    if n == 2:
        return 1
    elif n == 3:
        return 2
    else:
        return b(n-1)+b(n-2)
    return 1


def c(n):
    if n == 9:
        return 1
    else:
        return 9*c(n-1)+(10**n-1)-c(n-1)
    return 1


def d(n):
    if n == 1:
        return 0
    else:
        return 3*d(n-1)+1
    return 1


def d1(n):
    if n == 1:
        return 0
    else:
        return ((3**n+1)-1)/2


print(s(3))
print(p(30))
print(b(1))
print(d(1))
