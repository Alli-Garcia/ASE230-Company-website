<?php
// Include the contacts.php file
include_once '.../02/admin/contacts/contacts.php';

// Retrieve all contact requests
$contactRequests = getContactRequests();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Requests</title>
</head>
<body>

    <h1>Contact Requests</h1>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($contactRequests as $index => $request): ?>
            <tr>
                <td><?php echo $request['id']; ?></td>
                <td><?php echo $request['name']; ?></td>
                <td><?php echo $request['email']; ?></td>
                <td>
                    <a href="detail.php?id=<?php echo $index; ?>">View Details</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>
