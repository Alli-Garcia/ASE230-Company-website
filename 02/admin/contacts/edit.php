<?php
// Include the contacts.php file
include_once 'db.php';
include_once 'contacts.php';

$contactManager = new ContactManager($pdo);

$contactRequests = $contactManager->index();

// Check if ID is provided in the URL
if (isset($_GET['id'])) {
    $contactManager = new ContactManager('../../data/realtors.json'); // Replace 'path_to_realtors.json' with the actual file path

    // Retrieve the details of the specific contact request using the ContactManager instance
    $contactRequest = $contactManager->detail($_GET['id']);

    if ($contactRequest) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Process the form data for updating the contact request
            $updatedContact = [
                'id' => $_GET['id'],
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                // Add other fields as needed
            ];

            $contactManager->edit($_GET['id'], $updatedContact);

            // Redirect to the detail page after editing
            header("Location: detail.php?id=" . $_GET['id']);
        }

        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Contact Request</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        </head>
        <body>
            <h1>Edit Contact Request</h1>
            <form method="post">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= $contactRequest['name'] ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $contactRequest['email'] ?>">
                </div>
                <!-- Add other form fields as needed -->
                <button type="submit" class="btn btn-primary">Save Changes</button>
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
