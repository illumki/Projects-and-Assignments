x = True
y = False
z = 12
a = 10
b = not (x or not (x or y)) and True

if b:
    print ("Happy")
elif not b and x:
    print ("Valentines")
else not b and not x and not y:
    print("day!")

if (z > a) or (2*a > z):
    print("C200")
else:
    print("is bliss")

if (x and y) or not x):
    print(a)

if (2 > z) or x:
    print("1")
if 2==1:
    print("2")
if y and not x:
    print("3")
if (2 < z):
    print("4")

def f(x):
if x==4:
    x=x*100
elif x==3:
    x=x*10
elif x==2:
    x=x*1000
else:
    (x!=4)*(x!=3)*(x!=2)*100000
    return (x==4)*100 + (x==3)*10 + (x==2)*1000 + (x!=4)*(x!=3)*(x!=2)*100000

print(f(4))
print(f(3))
print(f(2))
print(f(1))