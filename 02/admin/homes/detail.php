<head>
    <title>Detail</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>

<?php

require('homes.php');

$homesManager = new HomesManager('../../data/homes.json');
$homeIndex = $_GET['home'];
$home = $homesManager->detail($homeIndex);
?>

<div class='h-100 d-flex flex-column align-items-center justify-content-center'>
    <h2><?= $home['address'] ?></h2>
    <p><?= $home['state'] ?></p>
    <p><?= $home['city'] ?>, <?= $home['zipcode'] ?></p>
    <img src=<?= $home['image'] ?> class='img-fluid'>
    <div>
        <?= '<button class="btn btn-danger" onclick="window.location.href=\'delete.php?home=' . $_GET['home'] . '\'">Delete</button><button class="btn btn-secondary" onclick="window.location.href=\'edit.php?home=' . $_GET['home'] . '\'">Edit</button>' ?>
    </div>
</div>

<script src="../../js/bootstrap.bundle.min.js"></script>
<script src="../../js/smooth-scroll.polyfills.min.js"></script>
<script src="../../js/gumshoe.polyfills.min.js"></script>