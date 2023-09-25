<?php
function readJsonFile($file)
{
    $fp = fopen($file, 'r');
    $data = fread($fp, filesize($file));
    fclose($fp);
    return json_decode($data, TRUE);
}
?>