<?php
require ('team.php')

// Check if user has confirmed deletion
if (isset($_POST['confirm']) && $_POST['confirm'] == 'yes') {
    // Get the index of the item to delete
    $index = $_POST['index'];

    // Load the team data from .csv file
    $teamMembers = array_map('str_getcsv', file('team.csv'));
    array_walk($teamMembers, function(&$a) use ($teamMembers) {
        $a = array_combine($teamMembers[0], $a);
    });
    array_shift($teamMembers);

    // Delete the item from the array
    unset($teamMembers[$index]);

    // Save the data to the file
    $file = fopen('team.csv', 'w');
    fputcsv($file, array_keys($teamMembers[0]));
    fwrite($file, "\n");
    foreach ($teamMembers as $teamMember) {
        fputcsv($file, $teamMember);
    }
    fclose($file);

    // Redirect the index page   
    header('location: index.php');
    exit();
}
// Get the index of the item to delete
$index = $_GET['index'];

// Load the current team data from the file
$teamMembers = array_map('str_getcsv', file('team.csv'));
array_walk($teamMembers, function(&$a) use ($teamMembers) {
    $a = array_combine($teamMembers[0], $a);
});
array_shift($teamMembers);

// Get item to delete
$item = $teamMembers[$index];

// Display confirmation message to user
echo '<p>Are you sure you wish to delete the following item(s)?</p>';
echo '<p>Name: ' . $item['name'] . '</p>';
echo '<p>Title: ' . $item['title'] . '</p>';
echo '<p>Bio: ' . $item['bio'] . '</p>';
echo '<p><a href="team.php">Cancel</a> | <a href="#" onclick="document.getElementById(\'delete-form\').submit();">Delete</a></p>';

// Display a form to submit the confirmation
echo '<form id="delete-form" method="post">';
echo '<input type="hidden" name="index" value="' . $index . '">';
echo '<input type="hidden" name="confirm" value="yes">';
echo '</form>';

?>