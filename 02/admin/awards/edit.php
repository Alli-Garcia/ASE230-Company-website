<?php
//the page shows a form where the fields are filled out with information about the specific chosen item.
//A "save changes" button enables the user to overwrite the item in the database.
require __DIR__ . '/awards.php';
if(array_key_exists('edit', $_POST)){
    edit($_GET["index"][1]);
}//edit($_GET["index"][1]);
?>
<!DOCTYPE html>
<html lang="en">
<body>
    <form method="post" action='../awards/index.php'>
    <label for="award">Award Title:</label><br>
        <input type="text" id="award" name="award"><br>
    <label for="description">Description:</label><br>
        <input type="text" id="award" name="award"><br>
        <input type="submit" name="edit" class="button" value="Edit"/>
    </form>
<?php

?>
</body>
</html>