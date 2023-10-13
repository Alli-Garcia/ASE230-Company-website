<head>
    <title>Create</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>

<?php
require('products.php');
?>

<form method='post'>
    <div class='form-group h-100 d-flex flex-column align-items-center justify-content-center'>
        <label for='nameInput'>Name</label>
        <input type='text' class='form-control' name='nameInput' placeholder='Enter name'>
        <label for='descriptionInput'>Description</label>
        <textarea class="form-control" name="descriptionInput" rows="3" placeholder='Enter description'></textarea>
        <label>Applications</label>
        <input type='text' class='form-control' name='application1NameInput' placeholder='Enter name of application 1'>
        <textarea class="form-control mt-1" name="application1DescriptionInput" rows="3"
            placeholder='Enter description of application 1'></textarea>
        <input type='text' class='form-control mt-3' name='application2NameInput'
            placeholder='Enter name of application 2'>
        <textarea class="form-control mt-1" name="application2DescriptionInput" rows="3"
            placeholder='Enter description of application 2'></textarea>
        <input type='text' class='form-control mt-3' name='application3NameInput'
            placeholder='Enter name of application 3'>
        <textarea class="form-control mt-1" name="application3DescriptionInput" rows="3"
            placeholder='Enter description of application 3'></textarea>
        <input type="submit" name="submitButton" class="btn btn-primary mt-2" value="Submit" />
    </div>
</form>

<?php

if (array_key_exists('submitButton', $_POST)){
    $newProduct = array('name' => $_POST['nameInput'], 'description' => $_POST['descriptionInput'], 'applications' => [array('name' => $_POST["application1NameInput"], 'description' => $_POST["application1DescriptionInput"]), array('name' => $_POST["application2NameInput"], 'description' => $_POST["application2DescriptionInput"]), array('name' => $_POST["application3NameInput"], 'description' => $_POST["application3DescriptionInput"])]);
    create($newProduct);
    $newProductIndex = count(index()) - 1;
}

    ?>

<script src="../../js/bootstrap.bundle.min.js"></script>
<script src="../../js/smooth-scroll.polyfills.min.js"></script>
<script src="../../js/gumshoe.polyfills.min.js"></script>