<?php
//the page shows a specific item. Also, a "delete" button enables you to delete the item, whereas an "edit" button enables the user to go to the edit page described below.
//print_r($_POST);
//print '<pre>' . print_r($_POST, true) . '</pre>';
require __DIR__ . '/awards.php';
detail($_POST['award']);
?>
<!DOCTYPE html>
<html lang="en">
<body>
    <form action="../awards/edit.php" method='get'>
	<button name="0" type="submit" value=<?php echo $_POST['award']//is int ?>>Edit</button></br>
</form>
    <form action="../awards/delete.php" method='get'>
    <button name="0" type="submit" value=<?php echo $_POST['award']//is int ?>>Delete</button>
</form>
</form>
</body>
</html>
<?php
?>