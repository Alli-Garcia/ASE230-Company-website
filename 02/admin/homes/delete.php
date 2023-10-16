<head>
    <title>Delete</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>

<?php
require('homes.php');
?>

<div class='h-100 d-flex flex-column align-items-center justify-content-center'>
    <h2>Are you sure you want to delete this item?</h2>
    <div class='flex-row'>
        <form method="post">
            <input name = "deleteButton" type="submit" class="btn btn-danger" value="Delete">
            <input name="cancelButton" type="submit" class="btn btn-dark" value="Cancel">
        </form>
    </div>
</div>

<?php

if (array_key_exists('deleteButton', $_POST)){
    $home = $_GET['home'];

    delete($home);
    header('Location: index.php');
}
else if (array_key_exists('cancelButton', $_POST)){
    header('Location: index.php');
}

?>

<script src="../../js/bootstrap.bundle.min.js"></script>
<script src="../../js/smooth-scroll.polyfills.min.js"></script>
<script src="../../js/gumshoe.polyfills.min.js"></script>