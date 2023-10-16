<head>
    <title>Edit</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>

<?php
require('homes.php');

$home = detail($_GET['home']);
?>

<form method='post'>
    <div class='form-group h-100 d-flex flex-column align-items-center justify-content-center'>
        <label for='addressInput'>Address</label>
        <input type='text' class='form-control' name='addressInput' value="<?= $home['address'] ?>">
        <label for='cityInput'>City</label>
        <input type='text' class='form-control' name='cityInput' value="<?= $home['city'] ?>">
        <label for='stateInput'>State</label>
        <input type='text' class='form-control' name='stateInput' value="<?= $home['state'] ?>">
        <label for='zipcodeInput'>Zip Code</label>
        <input type='text' class='form-control' name='zipcodeInput' value="<?= $home['zipcode'] ?>">
        <label for='imageInput'>Image URL</label>
        <input type='text' class='form-control' name='imageInput' value="<?= $home['image'] ?>">
        <input type="submit" name="submitButton" class="btn btn-primary mt-2" value="Save Changes" />
    </div>
</form>

<?php

if (array_key_exists('submitButton', $_POST)){
    $editedHome = array('address' => $_POST['addressInput'], 'city' => $_POST['cityInput'], 'state' => $_POST['stateInput'], 'zipcode' => $_POST['zipcodeInput'], 'image' => $_POST['imageInput']);
    edit($_GET['home'], $editedHome);
    header("Location: index.php");
}

    ?>

<script src="../../js/bootstrap.bundle.min.js"></script>
<script src="../../js/smooth-scroll.polyfills.min.js"></script>
<script src="../../js/gumshoe.polyfills.min.js"></script>