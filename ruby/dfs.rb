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

  def depth_first_search(start)
    result = []
    visited = {}
    adjacency_list = @adjacency_list

    dfs = lambda do |vertex|
      return if vertex.nil?

      visited[vertex] = true
      result << vertex
      adjacency_list[vertex].each do |neighbor|
        dfs.call(neighbor) unless visited[neighbor]
      end
    end

    dfs.call(start)
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

puts "DFS starting from vertex A: #{graph.depth_first_search('A')}"
