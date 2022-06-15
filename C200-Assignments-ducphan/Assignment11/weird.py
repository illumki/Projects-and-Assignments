import matplotlib.pyplot as plt

xlst, ylst = [],[]

def f(n):
    if n%2 == 0:
        return n//2
    else:
        return (3*n) + 1

def g(n, i):
    xlst.append(i)
    ylst.append(n)
    print(str(n)+" ",end="")
    if n == 1:
        return 1
    else:
        return g(f(n), i + 1)
g(26,0)
xmax = max(tuple(xlst))
ymax = max(tuple(ylst))
print("\nNumber of recursive calls: {0}\nMaximum number: {1}".format(xmax, ymax))
plt.plot(xlst,ylst,"r--")
plt.axis([0,xmax,0,ymax])
plt.show()
