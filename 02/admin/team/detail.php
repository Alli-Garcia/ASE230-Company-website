<?php
require 'team.php';

if (isset($_GET['team_member'])) {
    $teamMemberName = $_GET['team_member'];
    $teamManager = new TeamManager('.../.../lib/team.csv'); // Specify the correct path to your CSV file
    $teamMember = $teamManager->getTeamMember($teamMemberName);

    if ($teamMember) {
        echo '<h1>' . $teamMember['Team member'] . '</h1>';
        echo '<p>' . $teamMember['Role'] . '</p>';
        echo '<p>' . $teamMember['Bio'] . '</p';

        // Add any additional information you want to display
    } else {
        echo '<p>Team member not found.</p>';
    }
}
?>
