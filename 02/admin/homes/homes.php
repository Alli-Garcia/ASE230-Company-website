<?php
function index() {
    $file = '../../data/homes.json';
    $fp = fopen($file, 'r');
    $data = fread($fp, filesize($file));
    fclose($fp);
    return json_decode($data, TRUE);
}

function detail($index) {
    $file = '../../data/homes.json';
    $fp = fopen($file, 'r');
    $data = fread($fp, filesize($file));
    fclose($fp);
    return json_decode($data, TRUE)[$index];
}

function create($product) {
    $file = '../../data/homes.json';
    $fp = fopen($file, 'r');
    $data = json_decode(fread($fp, filesize($file)), TRUE);
    array_push($data, $product);
    $data = json_encode($data, JSON_UNESCAPED_UNICODE);
    fclose($fp);

    file_put_contents($file, $data);
}

function edit($index, $product) {
    $file = '../../data/homes.json';
    $fp = fopen($file, 'r');
    $data = json_decode(fread($fp, filesize($file)), TRUE);
    $data[$index] = $product;
    $data = json_encode($data, JSON_UNESCAPED_UNICODE);
    fclose($fp);

    file_put_contents($file, $data);
}

function delete($index) {
    $file = '../../data/homes.json';
    $fp = fopen($file, 'r');
    $data = json_decode(fread($fp, filesize($file)), TRUE);
    unset($data[$index]);
    array_values($data);
    $data = json_encode($data, JSON_UNESCAPED_UNICODE);
    fclose($fp);

    file_put_contents($file, $data);
}

?>