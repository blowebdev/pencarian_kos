<?php

class NaiveBayes
{
    private $classes;
    private $classProbabilities;
    private $wordProbabilities;

    public function train($data)
    {
        $totalDocs = count($data);
        $this->classes = array();
        $this->classProbabilities = array();
        $this->wordProbabilities = array();

        // Hitung frekuensi kelas
        foreach ($data as $doc) {
            $class = $doc['class'];
            if (!isset($this->classes[$class])) {
                $this->classes[$class] = 0;
            }
            $this->classes[$class]++;
        }

        // Hitung probabilitas kelas
        foreach ($this->classes as $class => $count) {
            $this->classProbabilities[$class] = $count / $totalDocs;
        }

        // Hitung frekuensi kata dalam setiap kelas
        foreach ($data as $doc) {
            $class = $doc['class'];
            $words = explode(' ', $doc['text']);
            foreach ($words as $word) {
                if (!isset($this->wordProbabilities[$word][$class])) {
                    $this->wordProbabilities[$word][$class] = 0;
                }
                $this->wordProbabilities[$word][$class]++;
            }
        }

        // Hitung probabilitas kata dalam setiap kelas
        foreach ($this->wordProbabilities as $word => $classCounts) {
            foreach ($classCounts as $class => $count) {
                $totalWordsInClass = array_sum($classCounts);
                $this->wordProbabilities[$word][$class] = $count / $totalWordsInClass;
            }
        }
    }

    public function predict($text)
    {
        $words = explode(' ', $text);
        $result = array();

        foreach ($this->classes as $class => $count) {
            $logProbability = log($this->classProbabilities[$class]);

            foreach ($words as $word) {
                if (isset($this->wordProbabilities[$word][$class])) {
                    $logProbability += log($this->wordProbabilities[$word][$class]);
                }
            }

            $result[$class] = $logProbability;
        }

        arsort($result);

        return key($result);
    }
}

// Contoh data training
$trainingData = [
    ['text' => 'rumah mewah strategis', 'class' => 'Kos'],
    ['text' => 'rumah murah', 'class' => 'Kos'],
    ['text' => 'rumah dekat kampus', 'class' => 'Kos'],
    ['text' => 'apartemen eksklusif', 'class' => 'Apartemen'],
    ['text' => 'apartemen nyaman', 'class' => 'Apartemen'],
    ['text' => 'apartemen mewah', 'class' => 'Apartemen'],
];

// Membuat dan melatih model Naive Bayes
$naiveBayes = new NaiveBayes();
$naiveBayes->train($trainingData);

// Contoh prediksi
$text = 'mewah';
$predictedClass = $naiveBayes->predict($text);

echo "Prediksi untuk teks '$text': $predictedClass";
?>
