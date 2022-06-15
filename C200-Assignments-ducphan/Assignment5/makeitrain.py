def dollars(x):
    q = .25
    d = .1
    n = .05
    p = .01
    qcount = 0
    dcount = 0
    ncount = 0
    pcount = 0
    coins = []
    while x >= 0:
        if x - q >= 0:
            qcount += 1
            x -= q
            x = round(x, 2)
        elif x - d >= 0:
            dcount += 1
            x -= d
            x = round(x, 2)
        elif x - n >= 0:
            ncount += 1
            x -= n
            x = round(x, 2)
        elif x - p >= 0:
            pcount += 1
            x -= p
            x = round(x, 2)
        else:
            coins.append(qcount)
            coins.append(dcount)
            coins.append(ncount)
            coins.append(pcount)
            return coins


print(dollars(2.24))
print(dollars(1.19))
print(dollars(4.16))
