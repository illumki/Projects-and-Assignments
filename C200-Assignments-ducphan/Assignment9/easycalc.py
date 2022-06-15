import math


def simpson(fn, a, b, n):
    delta_x = (b - a)/n

    interval = lambda i: a + i*delta_x
    h = (b-a)/n
    k = 0.0
    x = a + h
    for i in range(1, n/2 + 1):
        k += 4*fn(x)
        x += 2*h

    x = a + 2*h
    for i in range(1, n/2):
        k += 2*fn(x)
        x += 2*h
    return (h/3)*(fn(a)+fn(b)+k)


def convert(x):
    if x.isnumeric():
        return float(x)
    else:
        return eval(x)


with open("funny.txt", "r") as xfile:
    xlines = [d.split(",") for d in xfile.read().split("\n")]

for i in xlines:
    body = i[0]
    fn = eval("lambda x : " + body)
    a = convert(i[1])
    b = convert(i[2])
    n = convert(i[3])
    answer = convert(i[4])
    integration = simpson(fn, a, b, n)
    error = abs((answer - integration)/answer)
    print("f(x) = {0} over [{1},{2}] is {3:.3f}".format(
        body, a, b, integration))
    print("Actual answer is {0:.3f}".format(answer))
    print("Error is {0:.3f}".format(error))
