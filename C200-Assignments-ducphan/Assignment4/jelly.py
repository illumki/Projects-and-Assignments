
def CountBeans(xlst):
    gsum = 0
    ysum = 0
    rsum = 0
    total = 0
    for element in xlst:
        if element == y:
            ysum += 1
        elif element == g:
            gsum += 1
        else:
            rsum += 1
        total += 1

    return (gsum, rsum, ysum, total)


y, g, r = "y", "g", "r"

beans = [y, y, g, g, y, y, y, g, g, g, g, y, y, y, y, y, y, y, r, r,
         r, r, r, r, r, r, r, r, y, y, r, g, g, y, r, r, r, y, y, y, g, r]

print("g={0}, r={1}, y={2}, total={3}".format(*CountBeans(beans)))
== == == =
