import matplotlib.pyplot as plt
import numpy as np

with open("Assignment11/acme_zyx.txt", "r") as xfile:
    xlines = [d.split(" ") for d in xfile.read().split("\n")] 
x=[]
y=[]
for i in xlines:
    x += [float(i[0])]
    y += [float(i[1])]
    
def mean(lst): 
    return sum(lst)/len(lst)
def sd(xlst): 
    total = 0
    for i in xlst:
        total += (i - mean(xlst))**2
    return math.sqrt(total/(len(xlst)-1))
   
x = [[2,3],[4,3],[1,1.4],[1,.5],[5,3]] 

def cc(xlst,ylst):
    total = 0
    for i in range(0, len(xlst)):
        total += ((xlst[i] - mean(xlst))/sd(xlst)) * ((ylst[i] - mean(ylst))/sd(ylst))
    return total / (len(xlst) - 1)

r = cc(x,y)  

print(r)
plt.plot([i[0] for i in x],[i[1] for i in x], "ro")
t = np.arange(0,6,.1)
plt.plot(t,t*.65 + .5,"g--")
plt.axis([0,6,0,6])
plt.xlabel("A values")
plt.ylabel("B value")
plt.title("r = {0:.3}".format(r))
plt.show()
