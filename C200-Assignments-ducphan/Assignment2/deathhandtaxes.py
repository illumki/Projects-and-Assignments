def unmarriedTax (income):
   if income (income>=0) and (income<=9700):
        tax = (0*income)
    elif (income > 9700) and (income<=39475):
        tax = (.1*income)
    elif (income > 39475) and (income<=84200):
        tax = (.12*income)
    elif (income > 84200) and (income<=160725):
        tax = (.22*income)
    elif (income>160725) and (income<=204100):
        tax = (.32*income)
    elif (income>204100) and (income<=510300):
        tax = (.35*income)
    elif (income > 510300):
    else:
        pass
def marriedTax (income):
      if income (income>=0) and (income<=13850):
        tax = (0*income)
    elif (income > 13850) and (income<=52850):
        tax = (.1*income)
    elif (income > 52850) and (income<=84200)
        tax = (.12*income)
    elif (income > 84200) and (income<=160725)
        tax = (.22*income)
    elif (income>160725) and (income<=204100)
        tax = (.32*income)
    elif (income>204100) and (income<=510300)
        tax = (.35*income)
    elif (income > 510300)
    else:
        pass

def tax(income, maritalStatus):
    if(maritalStatus):
        return marriedTax(income)
    else:
        return unmarriedTax(income)


UrsalaIncome,UrsalaMarried = 160726, True
KaiserIncome, KaiserMarried = 501000, True
ShilahIncome, ShilahMarried = 20, True

print("Ursala owes ", tax(UrsalaIncome, UrsalaMarried))
print("Kaiser owes ", tax(KaiserIncome, KaiserMarried))
print("Shilah owes ", tax(ShilahIncome, ShilahMarried))

UrsalaIncome,UrsalaMarried = 204099, False
KaiserIncome, KaiserMarried = 510310, False
ShilahIncome, ShilahMarried = 9400, False

print("Ursala owes ", tax(UrsalaIncome, UrsalaMarried))
print("Kaiser owes ", tax(KaiserIncome, KaiserMarried))
print("Shilah owes ", tax(ShilahIncome, ShilahMarried))