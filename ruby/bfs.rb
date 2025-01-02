class Graph
  def initialize
    @adjacency_list = {}
  end

  def add_vertex(vertex)
    @adjacency_list[vertex] ||= []
  end

  def add_edge(vertex1, vertex2)
    @adjacency_list[vertex1] << vertex2
    @adjacency_list[vertex2] << vertex1
  end

  def breadth_first_search(start)
    queue = [start]
    result = []
    visited = {}
    visited[start] = true

    until queue.empty?
      vertex = queue.shift
      result << vertex

      @adjacency_list[vertex].each do |neighbor|
        unless visited[neighbor]
          visited[neighbor] = true
          queue << neighbor
        end
      end
    end

    result
  end
end

# Example usage:
graph = Graph.new
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

puts "BFS starting from vertex A: #{graph.breadth_first_search('A')}"
