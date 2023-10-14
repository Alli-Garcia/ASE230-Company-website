<?php
//the page contains a form that enables the user to create a new item.
//As the user submits the form, the item is added to the database and the user is taken to the edit page described below.
require __DIR__ . '/awards.php';
if(isset($_POST)){
    $ref = create();
    echo $ref;
}
?>
<!DOCTYPE html>
<html lang="en">
<body>
    <form method="get" action='../awards/edit.php'>
    <button type="submit" name="0" value="<?php echo $ref-1; ?>">Create</button><br />
    </form>
<!--<a href=edit.php class="btn btn-secondary"> Create </a>-->

</body>
</html>