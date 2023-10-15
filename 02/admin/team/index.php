<?php
// list all available items in ../../data/team.csv database
require('team.php');
print '<pre>' . print_r($awards, true) . '</pre>';
$teamMembers = getTeamMembers();
foreach ($teamMembers as $teamMember) {
    // display team member information
    echo '<h1>' . $teamMember['Team member'] . '</h1>';
    echo '<p><strong>Role:</strong> ' . $teamMember['Role'] . '</p>';
    echo '<p><strong>Bio:</strong> ' . $teamMember['Bio'] . '</p>';
}
echo '<a href="create.php"><button>Create</button></a>';
?>