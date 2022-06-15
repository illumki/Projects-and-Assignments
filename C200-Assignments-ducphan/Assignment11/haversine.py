#change lat,lon to radians
from math import radians, sin, cos, sqrt, asin

 #INPUT two tuples that have lat, lon values
 #RETURN distance in miles
def hd(loc1,loc2):
     r = 3961 #miles
    lat1,lon1 = loc1
    lat2,lon2 = loc2
    latdistance = (radians(lat2 - lat1))
    londistance = (radians(lon2 - lon1))
    x = sin(latdistance/2)*sin(latdistance/2) + cos(radians(lat1))*cos(radians(lat2))*(sin(radians(londistance/2)))**2
    final = 2*r*(asin(x)**(1/2))

    return final

def dd(loc1,loc2):
    lat1,lon1 = loc1
    lat2,lon2 = loc2
    x = lat1 - lat2
    y = (lon1 - lon2)*cos(radians(lat2))
    return 69.385*sqrt(x**2 + y**2)

def eu_distance(loc1,loc2):
    return sqrt(sum([(i-j)**2 for i,j in zip(loc1,loc2)]))

l1 = (39.165341,-86.523588)
l2 = (39.172725,-86.523295)

print(hd(l1,l2))
print(eu_distance(l1,l2))
print(dd(l1,l2))
