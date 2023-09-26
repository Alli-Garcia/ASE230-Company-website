<?php
function read_file($file)
{
    $data = file_get_contents($file); // Read the entire file into a string
    echo $data; // Print the data
    return $data; // Return the data
}

function testReadFile()
{
    $expected = "Overview:
NaturaTech Solutions Inc., established in 2019, is an eco-tech enterprise headquartered amidst the greenery of Portland, Oregon. Embracing the philosophy of \"Progress in Harmony,\" the company strives to produce technology that integrates seamlessly with nature, aiming to restore environmental balance and promote sustainable living.
Mission Statement:
\"To bridge the chasm between technology and nature, weaving them together to pioneer solutions that nurture the Earth and advance humanity.\"";
    
    $actual = read_file("test.txt");

    // Compare the expected and actual content
    if ($expected === $actual) {
        echo "Test passed!";
    } else {
        echo "Test failed.";
    }
}

testReadFile();
?>
