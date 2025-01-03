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

    public function addEdge($vertex1, $vertex2, $weight) {
        $this->adjacencyList[$vertex1][] = ['node' => $vertex2, 'weight' => $weight];
        $this->adjacencyList[$vertex2][] = ['node' => $vertex1, 'weight' => $weight];
    }

    public function dijkstra($start, $end) {
        $distances = [];
        $queue = new PriorityQueue();
        $previous = [];
        $path = [];
        $smallest;

        foreach ($this->adjacencyList as $vertex => $value) {
            if ($vertex === $start) {
                $distances[$vertex] = 0;
                $queue->enqueue($vertex, 0);
            } else {
                $distances[$vertex] = INF;
                $queue->enqueue($vertex, INF);
            }
            $previous[$vertex] = null;
        }

        while (count($queue->values)) {
            $smallest = $queue->dequeue()['val'];
            if ($smallest === $end) {
                while ($previous[$smallest]) {
                    $path[] = $smallest;
                    $smallest = $previous[$smallest];
                }
                break;
            }

            if ($smallest || $distances[$smallest] !== INF) {
                foreach ($this->adjacencyList[$smallest] as $neighbor) {
                    $candidate = $distances[$smallest] + $neighbor['weight'];
                    $nextNeighbor = $neighbor['node'];
                    if ($candidate < $distances[$nextNeighbor]) {
                        $distances[$nextNeighbor] = $candidate;
                        $previous[$nextNeighbor] = $smallest;
                        $queue->enqueue($nextNeighbor, $candidate);
                    }
                }
            }
        }

        return array_reverse(array_merge([$smallest], $path));
    }
}

class PriorityQueue {
    public $values;

    public function __construct() {
        $this->values = [];
    }

    public function enqueue($val, $priority) {
        $this->values[] = ['val' => $val, 'priority' => $priority];
        $this->sort();
    }

    public function dequeue() {
        return array_shift($this->values);
    }

    private function sort() {
        usort($this->values, function($a, $b) {
            return $a['priority'] - $b['priority'];
        });
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

$graph->addEdge('A', 'B', 4);
$graph->addEdge('A', 'C', 2);
$graph->addEdge('B', 'E', 3);
$graph->addEdge('C', 'D', 2);
$graph->addEdge('C', 'F', 4);
$graph->addEdge('D', 'E', 3);
$graph->addEdge('D', 'F', 1);
$graph->addEdge('E', 'F', 1);

echo "Shortest path from A to E: " . implode(", ", $graph->dijkstra('A', 'E'));

?>
