<?php
 require 'team.csv';
# Function to retrieve and index all items
function getTeamMembers()
{
    $teamMembers = [];
    $file = fopen("team.csv", "r");
    $headers = fgetcsv($file); // Skip the headers
    while (($data = fgetcsv($file)) !== false) {
        $teamMember = array_combine($headers, $data);
        $teamMembers[] = $teamMember;
    }
    fclose($file);
    return $teamMembers;
}

# Function to retrieve specific item
function getTeamMember($teamMemberName)
{
    $file = fopen("team.csv", "r");
    $headers = fgetcsv($file); // Skip the headers
    while (($data = fgetcsv($file)) !== false) {
        $teamMember = array_combine($headers, $data);
        if ($teamMember['Name'] == $teamMemberName) {
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
    $file = fopen("team.csv", "a");
    fputcsv($file, $teamMember);
    fclose($file);
}

# Function to modify an item
function updateTeamMember($teamMemberName, $updatedTeamMember)
{
    $file = fopen("team.csv", "r+");
    $headers = fgetcsv($file); // Skip the headers
    $updated = false;
    $newData = [];
    while (($data = fgetcsv($file)) !== false) {
        $teamMember = array_combine($headers, $data);
        if ($teamMember['Name'] == $teamMemberName) {
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
    $file = fopen("team.csv", "r+");
    $headers = fgetcsv($file); // Skip the headers
    $deleted = false;
    $newData = [];
    while (($data = fgetcsv($file)) !== false) {
        $teamMember = array_combine($headers, $data);
        if ($teamMember['Name'] == $teamMemberName) {
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