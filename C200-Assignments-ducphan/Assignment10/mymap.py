import gmplot
gmap = gmplot.GoogleMapPlotter(39.168451, -86.51891,15)

l1 = (39.165341,-86.523588)
l2 = (39.172725,-86.523295)
l3 = (39.170992, -86.517981)
lats = [l1[0],l2[0],l3[0]]
lons = [l1[1],l2[1],l3[1]]

gmap.scatter(lats, lons,"red", size=30, marker=False)
gmap.plot(lats,lons, "cornflowerblue", size=30, marker=False)