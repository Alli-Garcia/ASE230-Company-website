<?php
// Include the contacts.php file
include_once 'db.php';
include_once 'contacts.php';

$contactManager = new ContactManager($pdo);

// Check if ID is provided in the URL
if (isset($_GET['id'])) {
    $contactId = $_GET['id'];

    // Retrieve the details of the specific contact request using the ContactManager instance
    $contactRequest = $contactManager->detail($contactId);

    if ($contactRequest) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Contact Request Details</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        </head>
        <body>
            <h1>Contact Request Details</h1>
            <p>ID: <?php echo $contactRequest['id']; ?></p>
            <p>Name: <?php echo $contactRequest['name']; ?></p>
            <p>Email: <?php echo $contactRequest['email']; ?></p>
            <!-- Add other details as needed -->
        </body>
        </html>
        <?php
    } else {
        echo 'Contact request not found.';
    }
} else {
    echo 'ID parameter not provided.';
}
?>
