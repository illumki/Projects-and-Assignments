def palindrome(x):
    w = x[::-1]
    if x == w:
        return True
    else:
        return False


print(palindrome("aba"))
print(palindrome("a"))
print(palindrome("abba"))
print(palindrome("amanaplanacanalpanama"))
print(palindrome("abca"))
print(palindrome("ac"))
print(palindrome("adabbba"))
print(palindrome("amandaplanacanalpanama"))
