for i in range(0, 20//2+1):
    print("*"*i)
for j in range(20//2+1, 20):
    print("*"*(20-j))

for x in range(0, 17//2+2):
    print("*"*(x))


k = 2*n - 16

for i in range(0, n):
    for j in range(0, k):
        print(end=" ")

    k = k - 1

    for j in range(0, i+1):
        print("* ", end="")


n = 5
triangle(n)
