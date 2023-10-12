<head>
    <title>Detail</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>

<?php

require('products.php');

$products = index();

$product = $products[$_GET['product']];

?>

<div class='h-100 d-flex flex-column align-items-center justify-content-center'>
    <h2><?= $product['name'] ?></h2>
    <p><?= $product['description']?></p>
    <h3>Applications</h3>
    <ul class='list-unstyled'>
        <?php

            for($i=0; $i < count($product['applications']); $i++){
                echo '<li><h5>' . $product['applications'][$i]['name'] . '</h5></li>';
                echo '<li><p>' . $product['applications'][$i]['description'] . '</p></li>';
            }

        ?>
    </ul>
</div>

<script src="../../js/bootstrap.bundle.min.js"></script>
<script src="../../js/smooth-scroll.polyfills.min.js"></script>
<script src="../../js/gumshoe.polyfills.min.js"></script>