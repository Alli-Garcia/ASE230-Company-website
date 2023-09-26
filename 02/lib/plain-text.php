<?php
// Define the path to the data file
$dataFilePath = '../data/data.txt';

// Check if the data file exists
if (file_exists($dataFilePath)) {
    // Read the content of the data file
    $data = file_get_contents($dataFilePath);

    // Display the data
    echo "<pre>" . $data . "</pre>";
} else {
    echo "Data file not found.";
}
?>
