<?php
include_once 'db.php';
include_once 'contacts.php';

if (isset($_GET['id'])) {
    $contactManager = new ContactManager($pdo);

    $contactRequest = $contactManager->detail($_GET['id']);

    if ($contactRequest) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Perform the deletion
            $contactManager->delete($_GET['id']);

            // Redirect to index.php or another page after deletion
            header("Location: index.php");
            exit();
        }
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Delete Contact Request</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        </head>
        <body>
            <h1>Delete Contact Request</h1>
            <p>Are you sure you want to delete the contact request for <?= $contactRequest['name'] ?>?</p>
            <form method="post">
                <button type="submit" class="btn btn-danger">Yes, Delete</button>
                <a href="index.php" class="btn btn-secondary">Cancel</a>
            </form>
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
