<?php
// Include the contacts.php file
include_once '.../.../contacts/contacts.php';

// Check if ID is provided in the URL
if (isset($_GET['id'])) {
    $contactRequestId = $_GET['id'];

    // Retrieve the specific contact request by ID
    $contactRequest = getContactRequestById($contactRequestId);

    if ($contactRequest) {
        // Display contact request details
        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Contact Request Details</title>
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
