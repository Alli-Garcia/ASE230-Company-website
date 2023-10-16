<?php
//the page contains a form that enables the user to create a new item.
//As the user submits the form, the item is added to the database and the user is taken to the edit page described below.
require __DIR__ . '/awards.php';
if(isset($_POST)){
    $ref = create();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Awards-Create</title>
</head>
<body>
    <form method="get" action='../awards/edit.php'>
    <button class="btn btn-lg btn-outline-dark btn-primary" type="submit" name="0" value="<?php echo $ref-1; ?>">Create</button><br />
    </form>
<!--<a href=edit.php class="btn btn-secondary"> Create </a>-->

</body>
</html>