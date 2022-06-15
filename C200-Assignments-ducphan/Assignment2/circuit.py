def circuit(A, B, C):
    def Z(a, b, c):
        if (a and b):
            x=True
        else:
            x = False
        if (x or c):
            return True
        else:
            return False
    return not c or not Z(a,b,c)
    
print(0,0,0,circuit(0,0,0))
print(0,0,1,circuit(0,0,1))
print(0,1,0,circuit(0,1,0))
print(0,1,1,circuit(0,1,1))
print(1,0,0,circuit(1,0,0))
print(1,0,1,circuit(1,0,1))
print(1,1,0,circuit(1,1,0))
print(1,1,1,circuit(1,1,1))