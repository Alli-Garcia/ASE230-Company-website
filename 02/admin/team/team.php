<?php
require '../../data/team.csv';
# Function to retrieve and index all items
function getTeamMembers()
{
    $teamMembers = [];
    $file = '../../data/team.csv';
    $fp = fopen($file, 'r');

    # Get headers
    $headers = fgetcsv($fp);

    while (($data = fgetcsv($fp)) !== false) {
        # Combine headers with data
        $teamMember = array_combine($headers, $data);
        $teamMembers[] = $teamMember;
    }

    fclose($fp);
    return $teamMembers;
}

# Function to retrieve specific item
function getTeamMember($teamMemberName)
{
    $teamMember = [];
    $file = fopen("../../data/team.csv", "r");
    $headers = fgetcsv($file); # Skip headers
    while (($data = fgetcsv($file)) !== false) {
        $teamMember = array_combine($headers, $data);
        if ($teamMember['Team member'] == $teamMemberName) {
            fclose($file);
            return $teamMember;
        }
    }
    fclose($file);
    return null;
}

# Function to create new item
function createTeamMember($teamMember)
{
    $file = fopen("../../data/team.csv", "a");
    fputcsv($file, $teamMember);
    fclose($file);
}

# Function to modify an item
function updateTeamMember($teamMemberName, $updatedTeamMember)
{
    $file = fopen("../../data/team.csv", "r+");
    $headers = fgetcsv($file); # Skip headers
    $updated = false;
    $newData = [];
    while (($data = fgetcsv($file)) !== false) {
        $teamMember = array_combine($headers, $data);
        if ($teamMember['Team member'] == $teamMemberName) {
            $newData[] = $updatedTeamMember;
            $updated = true;
        } else {
            $newData[] = $teamMember;
        }
    }
    if ($updated) {
        rewind($file);
        fputcsv($file, $headers);
        foreach ($newData as $data) {
            fputcsv($file, $data);
        }
        ftruncate($file, ftell($file));
    }
    fclose($file);
    return $updated;
}

# Function to delete an item
function deleteTeamMember($teamMemberName)
{
    $file = fopen("../../data/team.csv", "r+");
    $headers = fgetcsv($file); # Skip headers
    $deleted = false;
    $newData = [];
    while (($data = fgetcsv($file)) !== false) {
        $teamMember = array_combine($headers, $data);
        if ($teamMember['Team member'] == $teamMemberName) {
            $deleted = true;
        } else {
            $newData[] = $teamMember;
        }
    }
    if ($deleted) {
        rewind($file);
        fputcsv($file, $headers);
        foreach ($newData as $data) {
            fputcsv($file, $data);
        }
        ftruncate($file, ftell($file));
    }
    fclose($file);
    return $deleted;
}
?>