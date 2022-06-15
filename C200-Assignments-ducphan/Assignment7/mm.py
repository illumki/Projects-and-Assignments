# b,r,y,g [right colors] [right positions]
b, r, y, g = 'b', 'r', 'y', 'g'


def result(hidden, guess):
    oh, og = hidden, guess
    dp = {'b': 0, 'r': 0, 'y': 0, 'g': 0}
    dcc = {'b': 0, 'r': 0, 'y': 0, 'g': 0}
    for i in hidden:
        dp[i] += 1
    for i in guess:
        dcc[i] += 1
    print("LOC", end="")
    print(dp)
    print("COL", end="")
    print(dcc)
    print("{0:<4} is hidden pattern".format(oh))
    print("{0:<4} is your guess".format(og))
