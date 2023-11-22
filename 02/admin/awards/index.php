<?php
require __DIR__ . '/db.php';
require __DIR__ . '/awards.php';

// Create an instance of AwardManager
$awardManager = new AwardManager($pdo);

// Check if the 'id' parameter is present in the URL
if (isset($_GET['id'])) {
    // Assuming you have a method edit() to retrieve an award by ID
    $id = $_GET['id'];
    
    // Retrieve the award by ID
    $award = $awardManager->edit($id);

    // Check if the award exists
    if ($award !== false) {
        $awards = [$award]; // Place the result in an array to match the structure of the index method
    } else {
        // Handle the case where the award does not exist
        echo "Error: Award not found.";
        exit(); // Optionally, you can redirect the user to another page
    }
} else {
    // Call the index method to get the awards
    $awards = $awardManager->index();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add your HTML head content here -->
</head>
<body>
    <!-- Display the list of awards or a specific award based on the 'id' parameter -->
    <form method="post" action="index.php">
        <?php
        $i = 0;
        foreach ($awards as $award) {
            ?>
            <button class="btn btn-lg btn-outline-dark btn-primary" name="award" type="submit" value="<?php echo $i; ?>"><?php echo $award['description']; ?></button><br>
            <?php
            $i++;
        }
        ?>
    </form>

    <form method="post" action="create.php">
        <!-- Add form fields here for the new award -->
        <button class="btn btn-lg btn-outline-dark btn-primary" type="submit" name="submit">Create</button><br />
    </form>

    <!-- Add your scripts or additional HTML content here -->

</body>
</html>
