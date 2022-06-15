import math
class MyComplexNumber:
    def __init__(self, rpart, ipart):
        self.rpart = rpart
        self.ipart = ipart
        self.cn = [self.rpart, self.ipart]

    def get_real(self):
        return self.rpart
    
    def get_imag(self):
        return self.ipart

    def __str__(self):
        return str(self.cn)

    def add(self, ix):
        real_part = self.get_real() + ix.get_real()
        imag_part = self.get_imag() + ix.get_imag()
        iy = MyComplexNumber(real_part, imag_part)
        return iy
    # the __add__ method is calling the self object which will take the self. plus the ix.
    def __add__(self,ix):
        real_part = self.get_real() + ix.get_real()
        imag_part = self.get_imag() + ix.get_imag()
        iy = MyComplexNumber(real_part, imag_part)
        return iy
    
    def __sub__(self,ix):
        real_part = self.get_real() - ix.get_real()
        imag_part = self.get_imag() - ix.get_imag()
        iy = MyComplexNumber(real_part, imag_part)
        return iy
    
    def __truediv__(self,other):
        real_part = self.get_real()/other.get_real() - self.get_imag()/other.get_imag()
        imag_part = self.get_real()/other.get_imag() + self.get_imag()/other.get_real()
        iy = MyComplexNumber(real_part, imag_part)
        return iy
    
    def __mul__(self,other):
        real_part = self.get_real()*other.get_real() - self.get_imag()*other.get_imag()
        imag_part = self.get_real()*other.get_imag() + self.get_imag()*other.get_real()
        iy = MyComplexNumber(real_part, imag_part)
        return iy


    def modulus(self):
        real_part = self.get_real()%other.get_real() - self.get_imag()%other.get_imag()
        imag_part = self.get_real()%other.get_imag() + self.get_imag()%other.get_real()
        iy = MyComplexNumber(real_part, imag_part)
        return iy
    
    def polar(self):
        real_part = self.get_real()*math.cos(math.radians(theta)) - self.get_imag()*math.cos(math.radians(theta))
        real_part = self.get_real()*math.cos(math.radians(theta)) + self.get_imag()*math.cos(math.radians(theta))

    
    x1 = MyComplexNumber(3,-1) 
    x2 = MyComplexNumber(1,4)  
    x3 = MyComplexNumber(-3,1)
    x4 = MyComplexNumber(2,-4)
    x5 = MyComplexNumber(-2,1)
    x6 = MyComplexNumber(1,2)
    x7 = MyComplexNumber(0,3)
    x8 = MyComplexNumber(-1,-1)
    x9 = MyComplexNumber(1,-1)
    x10 = MyComplexNumber(4,-3)
    x11 = MyComplexNumber(3,2)
    x12 = MyComplexNumber(1,1)

    print(x1 + x2)
    print(x1 * x2)
    print(x3 + x4)
    print(x3 * x4)
    print()
    print(x5/x6)
    print(x7/x8)
    print(x9.modulus())
    print(x10.modulus())
    print()
    print(x12.polar())