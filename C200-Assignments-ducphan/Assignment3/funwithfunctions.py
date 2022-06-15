import math
#1
def y(d,r,t):
    return d*math.exp(1)**(r*t)
    #dollar times e exponet to the r times t power
def N(n_0, m, t):
    return n_0*math.exp(1)**(m*t)
    #n_0 times e exponet m times t
def N_t(t):
    return (71.8*math.exp(1)**(-8.96*math.exp(1))**(-0.0685*t)
    #71.8 times e exponet -8.96 times e exponet -0.0685 times t
def K(t):
    return ((9/2.6*(t))/((2*t**2)+3))
    #9 divide by 2.6 times t divided by 2 times t exponet 2 plus 3
def r(t):
    return (1.5207*t**4)-(19.166*t**3)+(62.91*t**2)+(6.0726*t)+1026
    #1.5207 times t exponet 4 minus 19.166 times t exponet plus 62.91 times t exponet 2 plus 6.0726 times t plus 1026
def p(x):
    return (4*x**2)-(100*x)-1000
    #4 times x exponet 2 minus 100 times x minus 1000
def W(P_i,P_f):
    return 8.314*math.log10(P_i/P_f)
    #8.314 times log10 times (P_i/P_f)
def depreciate(c,s,life):
    return (c-s)/life
    #c minus s divided life
def L(k,V,A,C):
    return k*V**2*A*C
    #k times V exponet 2 times A times C
print(y(1000,.02,10))
print(N(500,100,4))
print(math.floor(N_t(1000)))
print(K(1))
print(r(4))
print(p(10))
print(W(10,1))
print(depreciate(20000,1000,5))
print(L(0.0033,33.8,512,0.515))