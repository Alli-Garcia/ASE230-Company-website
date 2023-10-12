<?php
//the page contains a form that enables the user to create a new item.
//As the user submits the form, the item is added to the database and the user is taken to the edit page described below.
require __DIR__ . '/awards.php';
/*if(count($_POST)>0){
    create();
}*/

?>
<!DOCTYPE html>
<html lang="en">
<body>
    <form method="post" action='../awards/edit.php'>
        <input type="submit" name="create" class="button" value="Create"/>
    </form>
<!--<a href=edit.php class="btn btn-secondary"> Create </a>-->
<?php
if(isset($_POST)){
    create();
}
?>
</body>
</html>