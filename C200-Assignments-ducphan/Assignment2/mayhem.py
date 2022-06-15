import math
#problem 1
def speed(d,t):
    
    return d/t



#problem2
def distance(s,t):
    return s*t



#problem 3
def time(s,d):
    return s*d


#problem 4
def hours_to_min(numberHours):
    return numberHours*60


#problem 5
def min_to_sec(numberMinutes):
    return numberMinutes*60


#problem 6
def feet_to_miles(numberFeet):
    return numberFeet/5280


#problem 7
def miles_to_kilometers(numberMiles):
    return numberMiles*1.60934

#problem 8
def kilometers_to_miles(numberKilometers):
    return numberKilometers/1.60934

#problem 9
def miles_to_feet(numberMiles):
    return numberMiles*5280

#problem 10
def degrees_to_radians(numberDegrees):
    return numberDegrees*((math.pi)/180)

#problem 11
def side_length_triangle(a, b, gamma):
    return ((a**2)+(b**2))-(2*(a)*(b)*math.cos)

#problem 12
def celsius_to_fahrenheit(numberDegreesC):
    return ((9/5)*numberDegreesC)+32

#problem 13
def fahrenheit_to_celsius(numberDegreesF):
    return (numberDegreesF-32)*(5/9)

#problem 14
    def kelvin_to_fahrenheit(numberKelvin):
        return (numberKelvin-273.15)*(9/5)+32

#problem 15
    def percent_change(s, d):
        if s<=0:
            return -(1-(s+d)/s)
        else: ((s+d)/s)-1
#problem 16
def parsecs_to_kilometers(numberParsecs):
    return numberParsecs*((3.086)*(10**13))

#problem 17
    def lightyears_to_parsecs(numberLightYears):
        return numberLightYears*3.26
s1=75
t1=4
t2=2020
t3=414241
d1=100
d2=1442412

print(speed(d1,t1), "miles/hour")
print(speed(miles_to_kilometers(d1),t1), "kilometers/hour")
print(speed(miles_to_kilometers(d1),min_to_sec(hours_to_min(t1))), "kilometers/hour")
print(celsius_to_fahrenheit(-30), "Fahrenheit")
print(min_to_sec(hours_to_min(1)), "seconds")
print(fahrenheit_to_celsius(-22), "Celcius")
print(celsius_to_fahrenheit(20), "Fahrenheit")
print(kelvin_to_fahrenheit(293), "Fahrenheit")
print(fahrenheit_to_celsius(kelvin_to_fahrenheit(293)), "Celcius")
print(side_length_triangle(8,11,37), " units")
print(degrees_to_radians(30), "radians")
print(percent_change(170.90,3.31), "percent change")
print(percent_change(170.90,-3.31), "percent change")
print(parsecs_to_kilometers(231), "kilometers")
print(lightyears_to_parsecs(100), "parsecs")