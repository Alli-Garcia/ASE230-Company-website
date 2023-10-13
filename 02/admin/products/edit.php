<head>
    <title>Edit</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>

<?php
require('products.php');

$product = detail($_GET['product']);
?>

<form method='post'>
    <div class='form-group h-100 d-flex flex-column align-items-center justify-content-center'>
        <label for='nameInput'>Name</label>
        <input type='text' class='form-control' name='nameInput' value="<?= $product['name'] ?>">
        <label for='descriptionInput'>Description</label>
        <textarea class="form-control" name="descriptionInput" rows="3"><?= $product['description'] ?></textarea>
        <label>Applications</label>
        <input type='text' class='form-control' name='application1NameInput' value='<?= $product['applications'][0]['name'] ?>'>
        <textarea class="form-control mt-1" name="application1DescriptionInput" rows="3"
            ><?= $product['applications'][0]['description'] ?></textarea>
        <input type='text' class='form-control mt-3' name='application2NameInput'
            value='<?= $product['applications'][1]['name'] ?>'>
        <textarea class="form-control mt-1" name="application2DescriptionInput" rows="3"
            ><?= $product['applications'][1]['description'] ?></textarea>
        <input type='text' class='form-control mt-3' name='application3NameInput'
            value='<?= $product['applications'][2]['name'] ?>'>
        <textarea class="form-control mt-1" name="application3DescriptionInput" rows="3"
            ><?= $product['applications'][2]['description'] ?></textarea>
        <input type="submit" name="submitButton" class="btn btn-primary mt-2" value="Save Changes" />
    </div>
</form>

<?php

if (array_key_exists('submitButton', $_POST)){
    $editedProduct = array('name' => $_POST['nameInput'], 'description' => $_POST['descriptionInput'], 'applications' => [array('name' => $_POST["application1NameInput"], 'description' => $_POST["application1DescriptionInput"]), array('name' => $_POST["application2NameInput"], 'description' => $_POST["application2DescriptionInput"]), array('name' => $_POST["application3NameInput"], 'description' => $_POST["application3DescriptionInput"])]);
    edit($_GET['product'], $editedProduct);
    header("Location: index.php");
}

    ?>

<script src="../../js/bootstrap.bundle.min.js"></script>
<script src="../../js/smooth-scroll.polyfills.min.js"></script>
<script src="../../js/gumshoe.polyfills.min.js"></script>