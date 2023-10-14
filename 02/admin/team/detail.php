<?php
    require 'team.php';

if (isset($_GET['index'])) {
    $index = $_GET['index'];
    detail($index);
    
    // create edit button
    echo '<div class="btn-group">';
    echo '<a href="edit.php?index=' . $index . '" class="btn btn-primary">Edit</a>';
    
    // create delete button
    echo '<a href="delete.php?index=' . $index . '" class="btn btn-danger">Delete</a>';
    echo '</div>';
}
?>