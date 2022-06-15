import astronomy as astr


def F(m):
    def lbToKg(pnds):
        pnds/2.20462
    myWeight = lbToKg(m)
    return (astr.gravitationalConstant * myWeight * astr.earthMass)/(astr.earthDiameter)**2


print("{0:.2f} Newtons.".format(F(143.3)))
