<?php
class ContactManager {
    private $filePath;

    public function __construct($filePath) {
        $this->filePath = $filePath;
    }

    public function loadContactRequests() {
        // Check if the file exists
        if (!file_exists($this->filePath)) {
            return []; // Return an empty array if the file doesn't exist
        }

        // Read the content of the JSON file
        $jsonContent = file_get_contents($this->filePath);

        var_dump($jsonContent);

        // Decode the JSON content into an associative array
        $data = json_decode($jsonContent, true);

        // Check if the 'realtors' key exists in the decoded data
        if (isset($data['realtors'])) {
            return $data['realtors'];
        } else {
            return []; // Return an empty array if the 'realtors' key is not found
        }
    }

    public function index() {
        $contactRequests = $this->loadContactRequests();
        return $contactRequests;
    }

    public function detail($index) {
        $contactRequests = $this->loadContactRequests();
        return isset($contactRequests[$index]) ? $contactRequests[$index] : null;
    }

    public function create($product) {
        $data = file_get_contents($this->filePath);
        $dataArray = json_decode($data, true);
        array_push($dataArray, $product);
        $data = json_encode($dataArray, JSON_UNESCAPED_UNICODE);
        file_put_contents($this->filePath, $data);
    }

    public function edit($index, $product) {
        $data = file_get_contents($this->filePath);
        $dataArray = json_decode($data, true);
        $dataArray[$index] = $product;
        $data = json_encode($dataArray, JSON_UNESCAPED_UNICODE);
        file_put_contents($this->filePath, $data);
    }

    public function delete($index) {
        $data = file_get_contents($this->filePath);
        $dataArray = json_decode($data, true);
        
        if (isset($dataArray[$index])) {
            unset($dataArray[$index]);
            $dataArray = array_values($dataArray); // Reindex the array
            $data = json_encode($dataArray, JSON_UNESCAPED_UNICODE);
            file_put_contents($this->filePath, $data);
        }
    }
}
?>