<?php
function readCSV($filename, $dataType) {
    $data = [];

    if (($handle = fopen($filename, "r")) !== false) {
        while (($row = fgetcsv($handle, 1000, ",")) !== false) {
            if ($dataType === "awards" && count($row) === 2) {
                // For achievements CSV with 2 columns (Year, Description)
                $data[] = $row;
            } elseif ($dataType === "team" && count($row) === 3) {
                // For team members CSV with 3 columns (Name, Role, Description)
                $data[] = $row;
            }
        }
        fclose($handle);
    }

    return $data;
}


$achievementsFile = "awards.csv";
$achievementsData = readCSV($achievementsFile, "awards");

// Example usage for team members CSV:
$teamMembersFile = "team.csv";
$teamMembersData = readCSV($teamMembersFile, "team");

// Now, $achievementsData contains the achievements CSV data, and $teamMembersData contains the team members CSV data.
?>
<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CSV Reader Test</title>
</head>
<body>
    <h1>Achievements</h1>
    <table>
        <tr>
            <th>Year</th>
            <th>Description</th>
        </tr>
        <?php foreach ($achievementsData as $row) : ?>
        <tr>
            <td><?= $row[0] ?></td>
            <td><?= $row[1] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h1>Team Members</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Role</th>
            <th>Description</th>
        </tr>
        <?php foreach ($teamMembersData as $row) : ?>
        <tr>
            <td><?= $row[0] ?></td>
            <td><?= $row[1] ?></td>
            <td><?= $row[2] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>-->