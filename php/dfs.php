<?php

class Graph {
    private $adjacencyList;

    public function __construct() {
        $this->adjacencyList = [];
    }

    public function addVertex($vertex) {
        if (!isset($this->adjacencyList[$vertex])) {
            $this->adjacencyList[$vertex] = [];
        }
    }

    public function addEdge($vertex1, $vertex2) {
        $this->adjacencyList[$vertex1][] = $vertex2;
        $this->adjacencyList[$vertex2][] = $vertex1;
    }

    public function depthFirstSearch($start) {
        $result = [];
        $visited = [];
        $adjacencyList = $this->adjacencyList;

        $dfs = function($vertex) use (&$dfs, &$result, &$visited, &$adjacencyList) {
            if (!$vertex) return null;
            $visited[$vertex] = true;
            $result[] = $vertex;
            foreach ($adjacencyList[$vertex] as $neighbor) {
                if (!isset($visited[$neighbor])) {
                    $dfs($neighbor);
                }
            }
        };

        $dfs($start);

        return $result;
    }
}

// Example usage:
$graph = new Graph();
$graph->addVertex('A');
$graph->addVertex('B');
$graph->addVertex('C');
$graph->addVertex('D');
$graph->addVertex('E');
$graph->addVertex('F');

$graph->addEdge('A', 'B');
$graph->addEdge('A', 'C');
$graph->addEdge('B', 'D');
$graph->addEdge('C', 'E');
$graph->addEdge('D', 'E');
$graph->addEdge('D', 'F');
$graph->addEdge('E', 'F');

echo "DFS starting from vertex A: " . implode(", ", $graph->depthFirstSearch('A'));

?>
