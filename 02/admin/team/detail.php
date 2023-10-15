<?php
require 'team.php';

if (isset($_GET['team_member'])) {
    $teamMemberName = $_GET['team_member'];
    $teamMember = getTeamMember($teamMemberName);

    if ($teamMember) {
        echo '<h1>' . $teamMember['Team member'] . '</h1>';
        echo '<p>' . $teamMember['Role'] . '</p>';
        echo '<p>' . $teamMember['Bio'] . '</p>';

        // create edit button
        echo '<div class="btn-group">';
        echo '<a href="edit.php?team_member=' . $teamMemberName . '" class="btn btn-primary">Edit</a>';

        // create delete button
        echo '<a href="delete.php?team_member=' . $teamMemberName . '" class="btn btn-danger">Delete</a>';
        echo '</div>';
    } else {
        echo '<p>Team member not found.</p>';
    }
}
?>