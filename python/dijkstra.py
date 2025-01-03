import heapq

class Graph:
    def __init__(self):
        self.adjacency_list = {}

    def add_vertex(self, vertex):
        if vertex not in self.adjacency_list:
            self.adjacency_list[vertex] = []

    def add_edge(self, vertex1, vertex2, weight):
        self.adjacency_list[vertex1].append((vertex2, weight))
        self.adjacency_list[vertex2].append((vertex1, weight))

    def dijkstra(self, start, end):
        distances = {vertex: float('infinity') for vertex in self.adjacency_list}
        distances[start] = 0
        priority_queue = [(0, start)]
        previous_vertices = {vertex: None for vertex in self.adjacency_list}

        while priority_queue:
            current_distance, current_vertex = heapq.heappop(priority_queue)

            if current_distance > distances[current_vertex]:
                continue

            for neighbor, weight in self.adjacency_list[current_vertex]:
                distance = current_distance + weight

                if distance < distances[neighbor]:
                    distances[neighbor] = distance
                    previous_vertices[neighbor] = current_vertex
                    heapq.heappush(priority_queue, (distance, neighbor))

        path, current_vertex = [], end
        while previous_vertices[current_vertex] is not None:
            path.append(current_vertex)
            current_vertex = previous_vertices[current_vertex]
        if path:
            path.append(start)
        return path[::-1]

# Example usage:
graph = Graph()
graph.add_vertex('A')
graph.add_vertex('B')
graph.add_vertex('C')
graph.add_vertex('D')
graph.add_vertex('E')
graph.add_vertex('F')

graph.add_edge('A', 'B', 4)
graph.add_edge('A', 'C', 2)
graph.add_edge('B', 'E', 3)
graph.add_edge('C', 'D', 2)
graph.add_edge('C', 'F', 4)
graph.add_edge('D', 'E', 3)
graph.add_edge('D', 'F', 1)
graph.add_edge('E', 'F', 1)

print("Shortest path from A to E:", graph.dijkstra('A', 'E'))
