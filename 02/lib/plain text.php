// A function for reading a plain text file

<?php
function read_file($file)
{
    $fp = fopen($file, 'r');
    $data = fread($fp, filesize($file));
    fclose($fp);
    return $data;
}

function testReadFile()
{
    $expected = "This is a plain text file.";
    $actual = read_file("test.txt");
    assert($expected === $actual);
}
?>