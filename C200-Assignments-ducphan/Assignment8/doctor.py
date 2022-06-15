# Telling the patient how is yes and no
yes_no = str(input("1 is yes, 0 is no. Understand?: "))

# Asking through inputs and integers
ab_pain = int(input("do you have abdomninal pain?: "))
nausea = int(input("Do you have nausea?: "))
vomit = int(input("Do you have vomiting?: "))
fever = int(input("Do you have a fever?: "))
l_o_a = int(input("Do you have loss of appetite?: "))

# If the patient answers adds up to >= 3, then that person has appendicits. Else, or if not, then that person does not have it.
if ((ab_pain) + (nausea) + (vomit) + (fever) + (l_o_a)) >= 3:
    print("You have Appendicits")
else:
    print("You do not have Appendicis")
