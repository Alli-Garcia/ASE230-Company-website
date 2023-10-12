<?php
// list all available items in team.csv database
 require('team.php');
$teamMembers = getTeamMembers();
foreach ($teamMembers as $teamMember) {
    // display team member information
    echo '<h1>' . $teamMember['Name'] . '</h1>';
    echo '<p><strong>Role:</strong> ' . $teamMember['Role'] . '</p>';
    echo '<p><strong>Bio:</strong> ' . $teamMember['Bio'] . '</p>';
}
echo '<a href="create.php"><button>Create</button></a>';
?>