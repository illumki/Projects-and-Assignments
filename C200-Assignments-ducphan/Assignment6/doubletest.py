import double as do

x = [[1, 2, 3], [], [1, 1, 1, 1]]
y = [[1, 1, 2, 2, 3, 3], [], [1, 1, 1, 1, 1, 1, 1, 1]]


def f(f, x, y): return f(x) == y


for i, j in zip(x, y):
    print(f(do.d1, i, j))
    print(f(do.d2, i, j))
    print(f(do.w1, i, j))
    print(f(do.w2, i, j))
