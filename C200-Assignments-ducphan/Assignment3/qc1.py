import numpy as np
import math
import numpy as np 
import matplotlib.pyplot as plt

def q(a,b,c):
    x = ((-b+math.sqrt(b**2-(4*a*c)))/(2*a))
    y = (-((-b+math.sqrt(b**2-(4*a*c)))/(2*a)))
    return (x,y)
print(q(1,3,-4))
print(q(2,-4,-3))
print(q(9,12,4))
print(q(3,4,2))

x1,y1 = q(1,-2,-4)
print(x1,y1)
f = lambda x:x**2 - 2*x - 4

print(f(x1),f(y1))

x = np.arange(-4.0, 5.0, 0.2)
plt.plot(x, x**2 - 2*x - 4,’g--’)
plt.plot(x,3*x**2 + 4*x + 2,’b--’)
plt.plot([-4,4],[0,0], color=’k’, linestyle=’-’, linewidth=2)
plt.plot([x1,y1],[0,0],’ro’)
plt.show()