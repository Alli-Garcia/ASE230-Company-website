<?php
//the page shows a form where the fields are filled out with information about the specific chosen item.
//A "save changes" button enables the user to overwrite the item in the database.

// TO DO: SEND A SPECIFIC ITEM HERE, CREATE LOOP TO RETRIEVE SAID ITEM, MODIFY SAID ITEM.

require __DIR__ . '/awards.php';
if(isset($_POST)){
    edit();
}//edit($_GET["index"][1]);
$file = '../../data/awards.csv';
$fp=fopen($file,'r+');
$content=fgetcsv($fp);
$title = $content[0];
$description = $content[1];
?>
<!DOCTYPE html>
<html lang="en">
<body>
    <form method="post" action='../awards/index.php'>
    <label for="award">Award Title:</label><br>
        <input type="text" id="award" name="award" value= "<?php echo $title; ?>"><br>
    <label for="description">Description:</label><br>
        <input type="text" id="award" name="award" value= "<?php echo $description; ?>"><br>
        <input type="submit" name="edit" class="button" value="Edit"/>
    </form>
<?php

?>
</body>
</html>