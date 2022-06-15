

def totalTD1(xlst):
    total_miles = 0
    total_time = 0
    for i in xlst:
        total_miles = total_miles + i[0]
        total_time = total_time + i[0] / i[1]
    return (total_miles, total_time)


def totalTD2(xlst):
    total_miles = 0
    total_time = 0
    for i in range(0, len(xlst)):
        total_miles = total_miles + xlst[i][0]
        total_time = total_time + xlst[i][0]/xlst[i][1]
    return (total_miles, total_time)


ds = [[100, 55], [200, 70], [421, 55], [156, 45], [156, 55]]

print("Total miles to Galvaston is {0} taking {1:.2f} hrs.".format(
    *totalTD1(ds)))
print("Total miles to Galvaston is {0} taking {1:.2f} hrs.".format(
    *totalTD2(ds)))

ds = [[100, 55], [200, 70], [421, 55], [156, 45], [156, 55]]

print("Total miles to Galvaston is {0} taking {1:.2f} hrs.".format(
    *totalTD1(ds)))
print("Total miles to Galvaston is {0} taking {1:.2f} hrs.".format(
    *totalTD1(ds)))
