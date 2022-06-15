def make_code(xlst,code):


def make_tree(xlst):




xlst = [[’w’,7],[’u’,12],[’x’,15],[’v’,18],[’y’,20]]
d = {}
f = lambda x: x[1] if type(x[0]) == str else x[0]
xlst.sort(key=f)
print(xlst)
