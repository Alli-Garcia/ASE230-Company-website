<?php

class HomesManager {
    private $file;

    public function __construct($file) {
        $this->file = $file;
    }

    public function index() {
        return $this->readData();
    }

    public function detail($index) {
        $data = $this->readData();
        return $data[$index] ?? null;
    }

    public function create($product) {
        $data = $this->readData();
        $data[] = $product;
        $this->writeData($data);
    }

    public function edit($index, $product) {
        $data = $this->readData();
        if (isset($data[$index])) {
            $data[$index] = $product;
            $this->writeData($data);
        }
    }

    public function delete($index) {
        $data = $this->readData();
        if (isset($data[$index])) {
            unset($data[$index]);
            $this->writeData(array_values($data));
        }
    }

    private function readData() {
        return file_exists($this->file) ? json_decode(file_get_contents($this->file), true) : [];
    }

    private function writeData($data) {
        file_put_contents($this->file, json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    }
}

// Usage:
$homesManager = new HomesManager('../../data/homes.json');
?>