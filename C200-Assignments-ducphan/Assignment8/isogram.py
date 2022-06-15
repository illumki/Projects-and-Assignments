def is_isogram(xword):
    return (xword, True) if xword and len(set(xword)) == len(xword) else (xword, False)


words = ["dermatoglyphics", "palindrome", "anagram"]

for w in words:
    print(is_isogram(w))
