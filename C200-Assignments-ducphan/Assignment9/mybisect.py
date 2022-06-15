f = lambda x: x**6 - x - 1

def sign(x):
    if b - c <= (a+b)/2:
        return c
    elif math.sign(f(b)) * math.sign(f(c)) <= 0:
        return a = c
    else:
        b = (a+b)/2
def bisect(f, a, b, tau):
    c = (a+b)/2.0
    while (b-a)/2.0 > tau:
        if f(c) == 0:
            return c
        elif f(a)*f(c) < 0:
            b = c
        else :
            a = c
        c = (a+b)/2.0
                
    return c

bisect(f, 1.0, 2.0, .001)
