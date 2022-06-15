import random as rn
import mm

ASCII_list = []
for i in ['y', 'g', 'b', 'r']:
    ASCII_list += [ord(i)]


def make_hidden():
    my_hidden = []
    for i in range(0, 4):
        my_hidden += [chr(ASCII_list[rn.randrange(0, 4)])]
    return my_hidden


my_guess = input("choose 4 colors without space r,g,y,b: ")
my_hidden = "".join(make_hidden())

numberOfGuesses = 0
while my_guess != my_hidden:
    mm.result(my_hidden, my_guess)
    my_guess = input("choose 4 colors without space r,g,y,b: ")
    numberOfGuesses += 1
print("You took {0} guesses".format(numberOfGuesses))
