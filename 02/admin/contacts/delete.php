<?php
// Include the contacts.php file
include_once 'contacts.php';

if (isset($_GET['id'])) {
    $contactManager = new ContactManager('../.../data/realtors.json'); // Replace 'path_to_realtors.json' with the actual file path
    $contactId = $_GET['id'];
    $deleted = $contactManager->delete($contactId);

    if ($deleted) {
        // Redirect to the index page
        // Redirect to the index page after deleting the contact request
        header("Location: index.php");
    } else {
        echo 'Contact request not found.';
    }
} else {
    echo 'ID parameter not provided.';
}
?>
