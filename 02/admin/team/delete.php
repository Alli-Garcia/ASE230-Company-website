<?php
require('team.php');

// Check if user has confirmed deletion
if (isset($_POST['confirm']) && $_POST['confirm'] == 'yes') {
    // Get the index of the item to delete
    $teamMember = $_POST['team_member'];

    // Load the team data from .csv file
    $teamMembers = array_map('str_getcsv', file('../../data/team.csv'));
    array_walk($teamMembers, function (&$a) use ($teamMembers) {
        $a = array_combine($teamMembers[0], $a);
    });
    array_shift($teamMembers);

    // Delete the item from the array
    unset($teamMembers[$teamMember]);

    // Save the data to the file
    $file = fopen('../../data/team.csv', 'w');
    fputcsv($file, array_keys($teamMembers[0]));
    fwrite($file, "\n");
    foreach ($teamMembers as $teamMember) {
        fputcsv($file, $teamMember);
    }
    fclose($file);

    // Redirect to index page   
    header('location: index.php');
    exit();
}
// Get the index of the item to delete
$teamMember = $_GET['team_member'];

// Load the current team data from the file
$teamMembers = array_map('str_getcsv', file('../../data/team.csv'));
array_walk($teamMembers, function (&$a) use ($teamMembers) {
    $a = array_combine($teamMembers[0], $a);
});
array_shift($teamMembers);

// Get item to delete
$item = $teamMembers[$teamMember];

// Display confirmation message to user
echo '<p>Are you sure you wish to delete the following item(s)?</p>';
echo '<p>Team member: ' . $item['team member'] . '</p>';
echo '<p>Role: ' . $item['role'] . '</p>';
echo '<p>Bio: ' . $item['bio'] . '</p>';
echo '<p><a href="team.php">Cancel</a> | <a href="#" onclick="document.getElementById(\'delete-form\').submit();">Delete</a></p>';

// Display a form to submit the confirmation
echo '<form id="delete-form" method="post">';
echo '<input type="hidden" name="index" value="' . $teamMember . '">';
echo '<input type="hidden" name="confirm" value="yes">';
echo '</form>';

?>