<?php

class Graph
{
    private $vertices;
    private $adjacencyMatrix;

    public function __construct($vertices)
    {
        $this->vertices = $vertices;
        $this->adjacencyMatrix = array();

        for ($i = 0; $i < $vertices; $i++) {
            $this->adjacencyMatrix[$i] = array_fill(0, $vertices, 0);
        }
    }

    public function addEdge($source, $destination, $weight)
    {
        $this->adjacencyMatrix[$source][$destination] = $weight;
        $this->adjacencyMatrix[$destination][$source] = $weight;
    }

    public function dijkstra($startVertex, $endVertex)
    {
        // Implementasi algoritma Dijkstra
    }

    public function generateGraphSVG()
    {
        $svg = '<svg width="400" height="400">';

        // Menggambar simpul-simpul
        for ($i = 0; $i < $this->vertices; $i++) {
            $x = rand(50, 350);
            $y = rand(50, 350);
            $svg .= '<circle cx="' . $x . '" cy="' . $y . '" r="10" fill="blue" />';
            $svg .= '<text x="' . $x . '" y="' . $y . '" text-anchor="middle" dominant-baseline="central">' . $i . '</text>';
        }

        // Menggambar koneksi antar simpul
        for ($i = 0; $i < $this->vertices; $i++) {
            for ($j = $i + 1; $j < $this->vertices; $j++) {
                if ($this->adjacencyMatrix[$i][$j] > 0) {
                    $svg .= '<line x1="' . rand(50, 350) . '" y1="' . rand(50, 350) . '" x2="' . rand(50, 350) . '" y2="' . rand(50, 350) . '" stroke="black" />';
                }
            }
        }

        $svg .= '</svg>';

        return $svg;
    }
}

// Membuat graf dengan 6 simpul
$graph = new Graph(6);

// Menambahkan koneksi antar simpul beserta bobotnya
$graph->addEdge(0, 1, 4);
$graph->addEdge(0, 2, 1);
$graph->addEdge(1, 2, 2);
$graph->addEdge(1, 3, 5);
$graph->addEdge(2, 3, 1);
$graph->addEdge(2, 4, 6);
$graph->addEdge(3, 4, 3);
$graph->addEdge(3, 5, 8);
$graph->addEdge(4, 5, 2);

// Menjalankan algoritma Dijkstra untuk mencari jalur terpendek dari simpul 0 ke simpul 5
$graph->dijkstra(0, 5);

// Menghasilkan gambar SVG dari graf
$graphSVG = $graph->generateGraphSVG();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Graph Visualization</title>
</head>
<body>
    <?php echo $graphSVG; ?>
</body>
</html>
