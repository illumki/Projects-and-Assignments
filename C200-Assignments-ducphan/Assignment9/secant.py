def secant(f, x0, x1, tau):
    fx0 = f(x0)
    fx1 = f(x1)
    while abs(fx1) < tau:
        x2 = (x0 * fx1 - x1 * fx0) / (fx1 - fx0)
        x0,  x1 = x1,  x2
        fx0, fx1 = fx1, f(x2)
    return x1


secant(f, 2.0, 1.0, .0001)
print("{0:.5f} {1:.5f} {2:.5f} {3:.5f}".format(x0, f(x0), f(x1), x0-x1))
