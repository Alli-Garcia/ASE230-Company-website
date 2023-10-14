<?php
//the page asks the user if they want to delete the item. As the user confirms,
//the item is removed from the database and the user is taken to the index page.
require __DIR__ . '/awards.php';
delete($_GET['0']);
?>
<!DOCTYPE html>
<html lang="en">
<body>
    <form method="post" action='../awards/index.php'>
    <label for="delete">Do you want to delete this item?</label><br>
        <input type="submit" name="delete" class="button" value="Delete"/>
    </form>
<?php

?>
</body>
</html>