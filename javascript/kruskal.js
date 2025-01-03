class DisjointSet {
    constructor(n) {
        this.parent = Array.from({ length: n }, (_, i) => i);
        this.rank = Array(n).fill(0);
    }

    find(x) {
        if (this.parent[x] !== x) {
            this.parent[x] = this.find(this.parent[x]);
        }
        return this.parent[x];
    }

    union(x, y) {
        const rootX = this.find(x);
        const rootY = this.find(y);

        if (rootX !== rootY) {
            if (this.rank[rootX] > this.rank[rootY]) {
                this.parent[rootY] = rootX;
            } else if (this.rank[rootX] < this.rank[rootY]) {
                this.parent[rootX] = rootY;
            } else {
                this.parent[rootY] = rootX;
                this.rank[rootX]++;
            }
        }
    }
}

class Graph {
    constructor(vertices) {
        this.V = vertices;
        this.edges = [];
    }

    addEdge(u, v, w) {
        this.edges.push([u, v, w]);
    }

    kruskalMST() {
        this.edges.sort((a, b) => a[2] - b[2]);
        const disjointSet = new DisjointSet(this.V);
        const result = [];

        for (const [u, v, w] of this.edges) {
            const setU = disjointSet.find(u);
            const setV = disjointSet.find(v);

            if (setU !== setV) {
                result.push([u, v, w]);
                disjointSet.union(setU, setV);
            }
        }

        return result;
    }
}

// Example usage:
const graph = new Graph(4);
graph.addEdge(0, 1, 10);
graph.addEdge(0, 2, 6);
graph.addEdge(0, 3, 5);
graph.addEdge(1, 3, 15);
graph.addEdge(2, 3, 4);

const mst = graph.kruskalMST();
console.log("Edges in the Minimum Spanning Tree:");
mst.forEach(([u, v, w]) => {
    console.log(`(${u}, ${v}) -> ${w}`);
});
