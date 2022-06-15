import math
import numpy as np
import matplotlib.pyplot as plt

x = np.arange(0., 10.0, 0.2)
plt.plot(x, x**2 + 2*x + 2)
plt.plot(x, x**3)
plt.plot(x, x*4 - 3)
plt.plot (x, math.exp(2)**(2*x)*10*x-100*x**2)
plt.xlabel("My Inputs")
plt.ylabel("My Outputs")
plt.title("Best Graph")
plt.show()
