<head>
    <title>Create</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>

<?php
require('homes.php');
?>

<form method='post'>
    <div class='form-group h-100 d-flex flex-column align-items-center justify-content-center'>
        <label for='addressInput'>Address</label>
        <input type='text' class='form-control' name='addressInput'>
        <label for='cityInput'>City</label>
        <input type='text' class='form-control' name='cityInput'>
        <label for='stateInput'>State</label>
        <input type='text' class='form-control' name='stateInput'>
        <label for='zipcodeInput'>Zip Code</label>
        <input type='text' class='form-control' name='zipcodeInput'>
        <label for='imageInput'>Image URL</label>
        <input type='text' class='form-control' name='imageInput'>
        <input type="submit" name="submitButton" class="btn btn-primary mt-2" value="Submit" />
    </div>
</form>

<?php

if (array_key_exists('submitButton', $_POST)){
    $newHome = array('address' => $_POST['addressInput'], 'city' => $_POST['cityInput'], 'state' => $_POST['stateInput'], 'zipcode' => $_POST['zipcodeInput'], 'image' => $_POST['imageInput']);
    create($newHome);
    
    header('Location: index.php');
}
?>

<script src="../../js/bootstrap.bundle.min.js"></script>
<script src="../../js/smooth-scroll.polyfills.min.js"></script>
<script src="../../js/gumshoe.polyfills.min.js"></script>