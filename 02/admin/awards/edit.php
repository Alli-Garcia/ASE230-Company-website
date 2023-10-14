<?php
//the page shows a form where the fields are filled out with information about the specific chosen item.
//A "save changes" button enables the user to overwrite the item in the database.

// TO DO: SEND A SPECIFIC ITEM HERE, CREATE LOOP TO RETRIEVE SAID ITEM, MODIFY SAID ITEM.
require __DIR__ . '/awards.php';

if(sizeof($_POST) !== 0){
//print '<pre>' . print_r($_POST, true) . '</pre>';
$file = '../../data/awards.csv';
$fp=fopen($file,'r');
$tempFp = fopen('../../data/temp.csv', 'w');
$awards = [];
$i=0;
while(($content=fgetcsv($fp)) == !false){ 
    if($_POST['edit'] == $i){
        $content[0] = $_POST['award'];
        $content[1] = $_POST['description'];
        $awards[$i] = $content;
        fputcsv($tempFp, $content, ',');
        $i++;               
    }
    else{
    $awards[$i] =$content;
    fputcsv($tempFp, $content);
    $i++;
    }
}
//print '<pre>' . print_r($awards, true) . '</pre>';
fclose($fp);
fclose($tempFp);
unlink('../../data/awards.csv');
rename('../../data/temp.csv','../../data/awards.csv');
echo 'Changes made.';

?>
<!DOCTYPE html>
<html lang="en">
<body>


    <form method="post" action='../awards/index.php'>    
        <button type="submit" name="index" class="button">Index</button>
    </form>
</form>
</body>
</html>
<?php


}
else{
//print '<pre>' . print_r($_GET, true) . '</pre>';
$awards = edit($_GET['0']);
//print '<pre>' . print_r($awards, true) . '</pre>';
?>
<!DOCTYPE html>
<html lang="en">
<body>


    <form method="post" action='../awards/edit.php'>
    <label for="award">Award Title:</label><br>
        <input type="text" id="award" name="award" value="<?php echo $awards['0']; ?>"><?php echo $awards['0']; ?></input><br>
    <label for="description">Description:</label><br>
        <input type="text" id="description" name="description" value="<?php echo $awards['1']; ?>"><?php echo $awards['1']; ?></input><br>
        <button type="submit" name="edit" class="button" value="<?php echo $_GET['0'] ?>">Edit</button>
    </form>
</form>
</body>
</html>
<?php
}
?>