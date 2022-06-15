class Queue:
    def __init__(self):
        self.queue = []
    def empty(self): 
        return self.queue == []
    def dequeue(self):
        if not self.empty():
            return self.queue.pop(0)
    def enqueue(self, x):
        self.queue.append(x)
        return self
    def __str__(self):
        return str(self.queue)

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

def bfsfull(g, node): 
    visited = []
    q = Queue()
    q.enqueue(node)
    while not q.empty():
        nnode = q.dequeue()
        if nnode not in visited:
            print(nnode)
            visited.append(nnode)
            clist = g.children(nnode)
            for n in clist:
                if n not in visited:
                    q.enqueue(n) 
        

g = Graph([1,2,3,4,5,6,7,8])
elst = [(1,2),(1,3),(2,8),(3,5),(3,4),(5,6),(6,4),(6,7)]
for i in elst:
    g.add_edge(i)
print(g.edges)
bfsfull(g,5)