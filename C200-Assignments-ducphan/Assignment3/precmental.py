import math
Gold = 1333.20
Silver = 16.10 
Platinum = 825.15
Palladium = 1344.90

Au, Ag, Pl, Pa = "Au", "Ag", "Pl", "Pa"

account = 100000
def preciousMetalToDollars(metal, amt):
    metalCost = 0
    if metal == "Au":
        metalCost =1333.20
    if metal == "Ag":
        metalCost = 16.10
    if metal =="Pl":
        metalCost = 825.15
    if metal == "Pa":
        metalCost = 1344.90
    return (account-metal*amount)
def dollarsToMetals(amt, metal):
    global account

print("\n{0} @ ${1:.2f} can buy {2} Oz costing${3:.2f}".format(metal, oneOunce,amtCanBuy,totalCost))
print("You currently have ${0:.2f} in your account.".format(account))

print("Amt {0} is ${1:.2f}".format(Au,preciousMetalToDollars(Au,5)))
print("Amt {0} is ${1:.2f}".format(Ag,preciousMetalToDollars(Ag,4)))
print("Amt {0} is ${1:.2f}".format(Pl,preciousMetalToDollars(Pl,3)))
print("Amt {0} is ${1:.2f}.".format(Pa,preciousMetalToDollars(Pa,2)))

dollarsToMetals(Gold,Au)
dollarsToMetals(25554,Pa)