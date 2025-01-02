class Graph:
    def __init__(self):
        self.adjacency_list = {}

    def add_vertex(self, vertex):
        if vertex not in self.adjacency_list:
            self.adjacency_list[vertex] = []

    def add_edge(self, vertex1, vertex2):
        self.adjacency_list[vertex1].append(vertex2)
        self.adjacency_list[vertex2].append(vertex1)

    def depth_first_search(self, start):
        result = []
        visited = set()
        adjacency_list = self.adjacency_list

        def dfs(vertex):
            if not vertex:
                return
            visited.add(vertex)
            result.append(vertex)
            for neighbor in adjacency_list[vertex]:
                if neighbor not in visited:
                    dfs(neighbor)

        dfs(start)
        return result

# Example usage:
graph = Graph()
graph.add_vertex('A')
graph.add_vertex('B')
graph.add_vertex('C')
graph.add_vertex('D')
graph.add_vertex('E')
graph.add_vertex('F')

graph.add_edge('A', 'B')
graph.add_edge('A', 'C')
graph.add_edge('B', 'D')
graph.add_edge('C', 'E')
graph.add_edge('D', 'E')
graph.add_edge('D', 'F')
graph.add_edge('E', 'F')

print("DFS starting from vertex A:", graph.depth_first_search('A'))
