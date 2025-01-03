<?php

class DisjointSet {
    private $parent;
    private $rank;

    public function __construct($n) {
        $this->parent = range(0, $n - 1);
        $this->rank = array_fill(0, $n, 0);
    }

    public function find($x) {
        if ($this->parent[$x] !== $x) {
            $this->parent[$x] = $this->find($this->parent[$x]);
        }
        return $this->parent[$x];
    }

    public function union($x, $y) {
        $rootX = $this->find($x);
        $rootY = $this->find($y);

        if ($rootX !== $rootY) {
            if ($this->rank[$rootX] > $this->rank[$rootY]) {
                $this->parent[$rootY] = $rootX;
            } elseif ($this->rank[$rootX] < $this->rank[$rootY]) {
                $this->parent[$rootX] = $rootY;
            } else {
                $this->parent[$rootY] = $rootX;
                $this->rank[$rootX]++;
            }
        }
    }
}

class Graph {
    private $V;
    private $edges;

    public function __construct($vertices) {
        $this->V = $vertices;
        $this->edges = [];
    }

    public function addEdge($u, $v, $w) {
        $this->edges[] = [$u, $v, $w];
    }

    public function kruskalMST() {
        usort($this->edges, function($a, $b) {
            return $a[2] - $b[2];
        });

        $disjointSet = new DisjointSet($this->V);
        $result = [];

        foreach ($this->edges as [$u, $v, $w]) {
            $setU = $disjointSet->find($u);
            $setV = $disjointSet->find($v);

            if ($setU !== $setV) {
                $result[] = [$u, $v, $w];
                $disjointSet->union($setU, $setV);
            }
        }

        return $result;
    }
}

// Example usage:
$graph = new Graph(4);
$graph->addEdge(0, 1, 10);
$graph->addEdge(0, 2, 6);
$graph->addEdge(0, 3, 5);
$graph->addEdge(1, 3, 15);
$graph->addEdge(2, 3, 4);

$mst = $graph->kruskalMST();
echo "Edges in the Minimum Spanning Tree:\n";
foreach ($mst as [$u, $v, $w]) {
    echo "($u, $v) -> $w\n";
}
