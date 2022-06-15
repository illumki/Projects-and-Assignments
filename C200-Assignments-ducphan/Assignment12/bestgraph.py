import numpy as np


class Graph:
    def __init__(self,nodes):
        self.nodes = nodes
        self.edges = {}
        for i in self.nodes:
            self.edges[i] = []
    def add_edge(self, pair):
        start,end = pair
        self.edges[start].append(end)
    def children(self,node):
        return self.edges[node]
    def nodes(self):
        return str(self.nodes)
    def __str__(self):
        return str(self.edges)
    def add_node(newnode):
        self.nodes.append(newnode)
        if newnode in self.nodes:
            return 1
        else:
            return -1 
    def del_node(self, node):
        if node in self.nodes:
            x = self.node(nodes)
            del x 
    def del_edge(self, edge):
        if edge in self.edges:
            x = self.edge(edges) 
            del x 


a = np.zeros ((4,4), dtype = int)
a[0][1] = 1
a[1][2] = 1
a[2][3] = 1
print(a)

a = np.dot (a,a) + a
print(a)
a = np.dot (a,a) + a
print(a)

for i in range(0,4):
    for j in range(0,4):
        if not i == j:
            print("{0} reaches {1}: {2}".format(i+1,j+1,bool(a[i][j])))