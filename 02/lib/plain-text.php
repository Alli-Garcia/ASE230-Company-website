<?php
function readTextFile() {
    // Define the path to the data file
    $dataFilePath = '../data/test.txt';

    // Initialize an empty string to store the content
    $data = '';

    // Check if the data file exists
    if (file_exists($dataFilePath)) {
        // Read the content of the data file
        $data = file_get_contents($dataFilePath);
    } else {
        $data = "Data file not found.";
    }

    // Return the content
    return $data;
}

// Call the function to get the content
$textContent = readTextFile();


echo "<pre>" . $textContent . "</pre>";
?>
