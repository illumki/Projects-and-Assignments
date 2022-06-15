import entropy as en

t1, a1 = [3/8, 5/8], .95
t2, a2 = [9/16, 7/16], .99
t3, a3 = [.25, .25, .25, .25], 2.0
t4, a4 = [1, 0], 0.0
s1 = ["a", "b", "a", "b", "a", "b", "b", "b"]
s2 = [0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1]
s3 = [(1), (2), (3), (4)]

test1 = [(t1, a1), (t2, a2), (t3, a3), (t4, a4)]
test2 = [(s1, a1), (s2, a2), (s3, a3)]


def g(x, y): return en.entropy(x) == y


def f(x, y): return en.entropy(en.makeProbability(x)) == y


for t in test1:
    print(g(*t))

for t in test2:
    print(f(*t))
