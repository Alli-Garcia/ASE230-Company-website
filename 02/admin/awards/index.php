<?php
//the file lists all the available items in a table. Clicking on an item will take the user to the detail page described below.
//Also, the page contains a "create" button that enables you to go to the create page described below.

require __DIR__ . '/awards.php';

$awards = index();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Awards-Index</title>
</head>

<body>
<form method = "post" action="../awards/detail.php" >

<?php
$i=0;
foreach ($awards as $award){
?>

<button class="btn btn-lg btn-outline-dark btn-primary" name="award" type="submit" value="<?php echo $i; ?>"> <?php echo $award[0] ?></button></br>

<?php
$i++;
} 


?>
</form>
    <form action="../awards/create.php">
	<button class="btn btn-lg btn-outline-dark btn-success " name="create" type="submit">Create</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

