<?php

function index() {
    $file = '../../data/realtors.json';
    $data = file_get_contents($file);
    return json_decode($data, TRUE);
}

function detail($index) {
    $file = '../../data/realtors.json';
    $data = file_get_contents($file);
    $dataArray = json_decode($data, TRUE);
    return isset($dataArray[$index]) ? $dataArray[$index] : null;
}

function create($product) {
    $file = '../../data/realtors.json';
    $data = file_get_contents($file);
    $dataArray = json_decode($data, TRUE);
    array_push($dataArray, $product);
    $data = json_encode($dataArray, JSON_UNESCAPED_UNICODE);
    file_put_contents($file, $data);
}

function edit($index, $product) {
    $file = '../../data/realtors.json';
    $data = file_get_contents($file);
    $dataArray = json_decode($data, TRUE);
    $dataArray[$index] = $product;
    $data = json_encode($dataArray, JSON_UNESCAPED_UNICODE);
    file_put_contents($file, $data);
}

function delete($index) {
    $file = '../../data/realtors.json';
    $data = file_get_contents($file);
    $dataArray = json_decode($data, TRUE);
    
    if (isset($dataArray[$index])) {
        unset($dataArray[$index]);
        $dataArray = array_values($dataArray); // Reindex the array
        $data = json_encode($dataArray, JSON_UNESCAPED_UNICODE);
        file_put_contents($file, $data);
    }
}

?>
