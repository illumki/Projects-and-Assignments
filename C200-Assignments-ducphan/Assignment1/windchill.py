#INPUT temperature in Fahrenheit T, wind speed in mph V
#RETURN wind chill temperature
#Twc=   35.74 + 0.6215T−35.75V ^ 0.16 + 0.4275TV ^ 0.16
def windChill(T,V):
     
    return 35.74+ (0.6215*T)-35.75*(V** 0.16) + 0.4275*T*(V**.16)
    

#TO DO: Implement

print(windChill(25,5))