import os
bank = {"A+": 5, "A-": 6, "O+": 4, "O-": 2,
        "B+": 5, "B-": 6, "AB+": 7, "AB-": 8}
donorReceiver = {
    "O-": ("O-", "O+", "A+", "A-", "B+", "B-", "AB+", "AB-"),
    "O+": ("O+", "A+", "B+", "AB+"),
    "A-": ("O-", "O+", "A+", "A-",),
    "A+": ("A+", "AB+"),
    "B+": ("B-", "B+", "AB+", "AB-"),
    "B-": ("B-", "B+", "AB+", "AB-"),
    "AB-": ("AB+", "AB-"),
    "AB+": ("AB+")}


def red_blood_compability(donorBloodType):
    blood = ()
    blood += donorReceiver[donorBloodType]


def showBank():
    print("Current Blood Bank")
    print("{0:>4} {1:>5}".format("Type", "Units"))
    for k, v in bank.items():
        print("{0:>4} {1:>4}".format(k, v))


def showTypeInBank(bloodType):
    units = bank[bloodType]
    print("{0:>1} units of {1:>2} in bank".format(units, bloodType))


def transfusion(donor, recipient, pints):
    if recipient in red_blood_compability(donor):
        if bank[donor] >= pints:
            bank[donor] = bank[donor]-pints
            return 1
        else:
            return 0
    else:
        return 0
    showBank()
    os.system("pause")

    if (transfusion("A+", "AB+", 4)):
        print("Transfusion successful")
    else:
        print("Transfultion failed")
    showTypeInBank("A+")
    os.system("pause")


print(transfusion("O+", "B-", 1))

print(transfusion("A-", "O-", 7))

print(transfusion("AB-", "AB+", 8))

os.system("pause")

showBank()
