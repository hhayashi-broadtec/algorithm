class DisjointSet
  def initialize(n)
    @parent = Array.new(n) { |i| i }
    @rank = Array.new(n, 0)
  end

  def find(x)
    @parent[x] = find(@parent[x]) if @parent[x] != x
    @parent[x]
  end

  def union(x, y)
    root_x = find(x)
    root_y = find(y)

    if root_x != root_y
      if @rank[root_x] > @rank[root_y]
        @parent[root_y] = root_x
      elsif @rank[root_x] < @rank[root_y]
        @parent[root_x] = root_y
      else
        @parent[root_y] = root_x
        @rank[root_x] += 1
      end
    end
  end
end

class Graph
  def initialize(vertices)
    @V = vertices
    @edges = []
  end

  def add_edge(u, v, w)
    @edges << [u, v, w]
  end

  def kruskal_mst
    @edges.sort_by! { |edge| edge[2] }
    disjoint_set = DisjointSet.new(@V)
    result = []

    @edges.each do |u, v, w|
      set_u = disjoint_set.find(u)
      set_v = disjoint_set.find(v)

      if set_u != set_v
        result << [u, v, w]
        disjoint_set.union(set_u, set_v)
      end
    end

    result
  end
end

# Example usage:
graph = Graph.new(4)
graph.add_edge(0, 1, 10)
graph.add_edge(0, 2, 6)
graph.add_edge(0, 3, 5)
graph.add_edge(1, 3, 15)
graph.add_edge(2, 3, 4)

mst = graph.kruskal_mst
puts "Edges in the Minimum Spanning Tree:"
mst.each do |u, v, w|
  puts "(#{u}, #{v}) -> #{w}"
end
