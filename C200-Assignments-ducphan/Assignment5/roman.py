def ones(a):
    if (a == 1):
        return "I"
    elif (a == 2):
        return "II"
    elif (a == 3):
        return "III"
    elif (a == 4):
        return "IV"
    elif (a == 5):
        return "V"
    elif (a == 6):
        return "VI"
    elif (a == 7):
        return "VII"
    elif (a == 8):
        return "VIII"
    elif (a == 9):
        return "IX"
    else:
        return ""


def tens(b):
    if (b == 10):
        return "X"
    elif (b == 20):
        return "XX"
    elif (b == 30):
        return "XXX"
    elif (b == 40):
        return "XL"
    elif (b == 50):
        return "L"
    elif (b == 60):
        return "LX"
    elif (b == 70):
        return "LXX"
    elif (b == 80):
        return "LXXX"
    elif (b == 90):
        return "XC"
    else:
        return ""


def roman(n):
    return (tens(n // 10)*10)+ones(n % 10)


for i in range(1, 100):
    if i % 5 == 0:
        print()
    print(i, roman(i), ", ", end="")
