require 'set'

class Graph
  def initialize
    @adjacency_list = {}
  end

  def add_vertex(vertex)
    @adjacency_list[vertex] ||= []
  end

  def add_edge(vertex1, vertex2, weight)
    @adjacency_list[vertex1] << { node: vertex2, weight: weight }
    @adjacency_list[vertex2] << { node: vertex1, weight: weight }
  end

  def dijkstra(start, target)
    distances = {}
    previous = {}
    nodes = Set.new

    @adjacency_list.each_key do |vertex|
      distances[vertex] = Float::INFINITY
      previous[vertex] = nil
      nodes.add(vertex)
    end

    distances[start] = 0

    until nodes.empty?
      smallest = nodes.min_by { |vertex| distances[vertex] }
      break if smallest == target || distances[smallest] == Float::INFINITY

      nodes.delete(smallest)

      @adjacency_list[smallest].each do |neighbor|
        alt = distances[smallest] + neighbor[:weight]
        if alt < distances[neighbor[:node]]
          distances[neighbor[:node]] = alt
          previous[neighbor[:node]] = smallest
        end
      end
    end

    path = []
    u = target
    while previous[u]
      path.unshift(u)
      u = previous[u]
    end
    path.unshift(start) if distances[target] != Float::INFINITY
    path
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

graph.add_edge('A', 'B', 4)
graph.add_edge('A', 'C', 2)
graph.add_edge('B', 'E', 3)
graph.add_edge('C', 'D', 2)
graph.add_edge('C', 'F', 4)
graph.add_edge('D', 'E', 3)
graph.add_edge('D', 'F', 1)
graph.add_edge('E', 'F', 1)

puts "Shortest path from A to E: #{graph.dijkstra('A', 'E')}"
