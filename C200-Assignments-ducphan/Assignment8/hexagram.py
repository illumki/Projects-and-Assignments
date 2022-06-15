def hex_dec(hex):
    hex_num = {"0": 0, "1": 1, "2": 2, "3": 3, "4": 4, "5": 5, "6": 6, "7": 7,
               "8": 8, "9": 9, "A": 10, "B": 11, "C": 12, "D": 13, "E": 14, "F": 15}
    exp = len(hex)-1
    sum = 0
    for i in hex:
        sum += hex_num[i]*(16**exp)
        exp -= 1
    return sum


hex = input("Hex: ")
print(hex_dec(hex))
