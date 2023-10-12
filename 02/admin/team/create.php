<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission
    $name = $_POST['name'];
    $role = $_POST['role'];
    $bio = $_POST['bio'];

    // Save new team member to team.csv
    $file = fopen('team.csv', 'a');
    fputcsv($file, [$name, $role, $bio]);
    fclose($file);

    // Redirect to the index
    header('Location: index.php');
    exit;
}
?>

<h1>Create New Team Member</h1>

<form method="POST">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="role">Role:</label>
    <input type="text" id="role" name="role" required>

    <label for="bio">Bio:</label>
    <textarea id="bio" name="bio" required></textarea>

    <button type="submit">Create</button>
</form>