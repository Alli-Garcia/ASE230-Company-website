<?php
require('team.php');

if (isset($_GET['index'])) {
    $index = $_GET['index'];

    // Load team data from .csv file
    $teamMembers = getTeamMembersFromCSV('team.csv');

    if ($index >= 0 && $index < count($teamMembers)) {
        $item = $teamMembers[$index];

        // Display confirmation message to user
        echo '<p>Are you sure you wish to delete the following item?</p>';
        echo '<p>Name: ' . $item['Name'] . '</p>';
        echo '<p>Title: ' . $item['Role'] . '</p>';
        echo '<p>Bio: ' . $item['Bio'] . '</p>';
        echo '<p><a href="team.php">Cancel</a> | <a href="#" onclick="document.getElementById(\'delete-form\').submit();">Delete</a></p>';

        // Display a form to submit confirmation
        echo '<form id="delete-form" method="post">';
        echo '<input type="hidden" name="index" value="' . $index . '">';
        echo '<input type="hidden" name="confirm" value="yes">';
        echo '</form>';
    } else {
        echo 'Index does not exist.';
    }
}

if (isset($_POST['confirm']) && $_POST['confirm'] == 'yes') {
    $index = $_POST['index'];

    // Load the team data from .csv file
    $teamMembers = getTeamMembersFromCSV('team.csv');

    if ($index >= 0 && $index < count($teamMembers)) {
        unset($teamMembers[$index]);

        // Save the data to the file
        saveTeamMembersToCSV('team.csv', $teamMembers);

        // Redirect to the index page
        header('Location: index.php');
        exit();
    } else {
        echo 'Invalid index.';
    }
}

function getTeamMembersFromCSV($csvFilePath) {
    $teamMembers = array_map('str_getcsv', file($csvFilePath));
    array_walk($teamMembers, function(&$a) use ($teamMembers) {
        $a = array_combine($teamMembers[0], $a);
    });
    array_shift($teamMembers);
    return $teamMembers;
}

function saveTeamMembersToCSV($csvFilePath, $teamMembers) {
    $file = fopen($csvFilePath, 'w');
    fputcsv($file, array_keys($teamMembers[0]));
    fwrite($file, "\n");
    foreach ($teamMembers as $teamMember) {
        fputcsv($file, $teamMember);
    }
    fclose($file);
}