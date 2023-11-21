<?php

require('db.php');
require('team.php');

// Check if user has confirmed deletion
if (isset($_POST['confirm']) && $_POST['confirm'] == 'yes') {
    // Get the id of the item to delete
    $id = $_POST['id'];

    // Create an instance of TeamManager
    $teamManager = new TeamManager($pdo);

    // Delete the item from the database
    $deleted = $teamManager->deleteTeamMember($id);

    // Redirect to the index page if deletion is successful
    if ($deleted) {
        header('location: index.php');
        exit();
    } else {
        // Handle deletion failure, e.g., display an error message
        echo 'Deletion failed.';
    }
}

// Get the id of the item to delete
$id = $_GET['id'];

// Create an instance of TeamManager
$teamManager = new TeamManager($pdo);

// Get item to delete
$item = $teamManager->getTeamMember($id);

// Display confirmation message to user
echo '<p>Are you sure you wish to delete the following item(s)?</p>';
echo '<p>Team member: ' . $item['Team member'] . '</p>';
echo '<p>Role: ' . $item['Role'] . '</p>';
echo '<p>Bio: ' . $item['Bio'] . '</p>';
echo '<p><a href="team.php">Cancel</a> | <a href="#" onclick="document.getElementById(\'delete-form\').submit();">Delete</a></p>';

// Display a form to submit the confirmation
echo '<form id="delete-form" method="post">';
echo '<input type="hidden" name="id" value="' . $id . '">';
echo '<input type="hidden" name="confirm" value="yes">';
echo '</form>';
?>
