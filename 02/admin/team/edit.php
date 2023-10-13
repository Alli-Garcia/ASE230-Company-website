<?php
// TODO: 
// create a form where the fields are poulated with the values from team.csv chosen
// when the form is submitted, the values are updated in team.csv
// the user is redirected to index.php
// make a "save changes button" that submits the form
require('team.php');

// Get index of the item to edit
$index = $_GET['index'];

// Load current team data from team.csv
$teamMembers = array_map('str_getcsv', file('team.csv'));
array_walk($teamMembers, function (&$a) use ($teamMembers) {
    $a = array_combine($teamMembers[0], $a);
});
array_shift($teamMembers);

// Get item to edit
$item = $teamMembers[$index];

// Display a form with current item data to user
echo '<form method="post" action="save.php">';
echo 'Team member: <input type="text" name="team_member" value="' . $item['team member'] . '"><br>';
echo 'Role: <input type="text" name="role" value="' . $item['role'] . '"><br>';
echo 'Bio: <textarea name="bio">' . $item['bio'] . '</textarea><br>';
echo '<input type="hidden" name="index" value="' . $index . '">';
echo '<input type="button" value="Save changes" onclick="this.form.submit()">';
echo '</form>';
?>