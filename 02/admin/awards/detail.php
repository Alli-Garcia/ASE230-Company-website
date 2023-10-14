<?php
//the page shows a specific item. Also, a "delete" button enables you to delete the item, whereas an "edit" button enables the user to go to the edit page described below.

require __DIR__ . '/awards.php';
detail($_GET["index"][1]);
?>
<a href=edit.php?index='<?php echo $_GET["index"][1];?>' class="btn btn-secondary">Edit<br></a>
<a href=delete.php?index='<?php echo $_GET["index"][1];?>' class="btn btn-secondary">Delete<br></a>
<?php
?>