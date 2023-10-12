<head>
    <title>Index</title>
    <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>

<?php
require('products.php');

$products = index();

?>

<div class='h-100 d-flex flex-column align-items-center justify-content-center'>
    <table class='mx-auto'>
        <tr>
            <th>Name</th>
        </tr>
        <?php
            
            for ($i = 0; $i < count($products); $i++) {
                echo '<tr>
                        <td><a href="detail.php?product=' . $i . '">' . $products[$i]['name'] .  '</a></td>
                    </tr>';
            }

        ?>
    </table>
    <button type='button' class='btn btn-primary mt-3' onclick='window.location.href="create.php"'>Create</button>
</div>

<script src="../../js/bootstrap.bundle.min.js"></script>
<script src="../../js/smooth-scroll.polyfills.min.js"></script>
<script src="../../js/gumshoe.polyfills.min.js"></script>