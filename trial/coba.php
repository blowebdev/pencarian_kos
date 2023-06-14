<?php

class Graph {
    public $nodes = array();

    public function addNode($node) {
        $this->nodes[$node] = array();
    }

    public function addEdge($node1, $node2, $weight) {
        $this->nodes[$node1][$node2] = $weight;
        $this->nodes[$node2][$node1] = $weight;
    }

    public function getRoutes($start, $end) {
        $visited = array();
        $routes = array();

        $this->dfs($start, $end, $visited, $routes);

        return $routes;
    }

    private function dfs($current, $end, $visited, &$routes) {
        $visited[] = $current;

        if ($current == $end) {
            $routes[] = $visited;
            return;
        }

        foreach ($this->nodes[$current] as $neighbor => $weight) {
            if (!in_array($neighbor, $visited)) {
                $this->dfs($neighbor, $end, $visited, $routes);
            }
        }
    }
}

// Create a graph
$graph = new Graph();

// Define the edges and weights from the database
$edges = array(
    array('node1' => 1, 'node2' => 2, 'weight' => 10),
    array('node1' => 1, 'node2' => 3, 'weight' => 3),
    array('node1' => 2, 'node2' => 3, 'weight' => 5),
    array('node1' => 2, 'node2' => 4, 'weight' => 8),
    array('node1' => 3, 'node2' => 4, 'weight' => 4),
    array('node1' => 3, 'node2' => 5, 'weight' => 2),
    array('node1' => 4, 'node2' => 5, 'weight' => 6),
);

// Build the graph
foreach ($edges as $edge) {
    $node1 = $edge['node1'];
    $node2 = $edge['node2'];
    $weight = $edge['weight'];

    if (!isset($graph->nodes[$node1])) {
        $graph->addNode($node1);
    }
    if (!isset($graph->nodes[$node2])) {
        $graph->addNode($node2);
    }

    $graph->addEdge($node1, $node2, $weight);
}

// Get routes from node 1 to node 5
$startNode = 1;
$endNode = 5;
$routes = $graph->getRoutes($startNode, $endNode);

// Display recommended routes
echo "Recommended routes from $startNode to $endNode:<br>";
foreach ($routes as $route) {
    echo implode(" -> ", $route) . "<br>";
}
?>
