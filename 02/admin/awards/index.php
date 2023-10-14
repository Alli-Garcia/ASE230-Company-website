<?php
//the file lists all the available items in a table. Clicking on an item will take the user to the detail page described below.
//Also, the page contains a "create" button that enables you to go to the create page described below.

require __DIR__ . '/awards.php';

$awards = index();
?>
<!DOCTYPE html>
<html lang="en">
<body>
<form method = "post" action="../awards/detail.php" >
<?php
$i=0;
foreach ($awards as $award){
?>
<button name="award" type="submit" value="<?php echo $i; ?>"> <?php echo $award[0] ?></button></br>
<?php
$i++;
} 
?>
</form>
    <form action="../awards/create.php">
	<button name="create" type="submit">Create</button>
</form>
<?php

?>
</body>
</html><?php

?>