<?php
require '../../data/team.csv';
# Function to retrieve and index all items
function getTeamMembers()
{
    $teamMembers = [];
    $file = '../../data/team.csv';
    $fp = fopen($file, 'r');
    $i = 0;
    while (($data = fgetcsv($fp)) == !false) {
        //print_r($content);
        $teamMembers[$i] = $data;
        $i++;
    }
    fclose($fp);
    print '<pre>' . print_r($teamMembers, true) . '</pre>';
    return $teamMembers;
}

# Function to retrieve specific item
function getTeamMember($teamMemberName)
{
    $file = fopen("../../data/team.csv", "r");
    $headers = fgetcsv($file); # Skip headers
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
    $file = fopen("../../data/team.csv", "r+");
    $headers = fgetcsv($file); # Skip headers
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