class DisjointSet:
    def __init__(self, n):
        self.parent = list(range(n))
        self.rank = [0] * n

    def find(self, x):
        if self.parent[x] != x:
            self.parent[x] = self.find(self.parent[x])
        return self.parent[x]

    def union(self, x, y):
        root_x = self.find(x)
        root_y = self.find(y)

        if root_x != root_y:
            if self.rank[root_x] > self.rank[root_y]:
                self.parent[root_y] = root_x
            elif self.rank[root_x] < self.rank[root_y]:
                self.parent[root_x] = root_y
            else:
                self.parent[root_y] = root_x
                self.rank[root_x] += 1

class Graph:
    def __init__(self, vertices):
        self.V = vertices
        self.edges = []

    def add_edge(self, u, v, w):
        self.edges.append((u, v, w))

    def kruskal_mst(self):
        self.edges.sort(key=lambda x: x[2])
        disjoint_set = DisjointSet(self.V)
        result = []

        for u, v, w in self.edges:
            set_u = disjoint_set.find(u)
            set_v = disjoint_set.find(v)

            if set_u != set_v:
                result.append((u, v, w))
                disjoint_set.union(set_u, set_v)

        return result

# Example usage:
graph = Graph(4)
graph.add_edge(0, 1, 10)
graph.add_edge(0, 2, 6)
graph.add_edge(0, 3, 5)
graph.add_edge(1, 3, 15)
graph.add_edge(2, 3, 4)

mst = graph.kruskal_mst()
print("Edges in the Minimum Spanning Tree:")
for u, v, w in mst:
    print(f"({u}, {v}) -> {w}")
