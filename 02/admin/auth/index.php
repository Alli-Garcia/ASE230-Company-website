<?php
include_once 'db.php'
include_once 'auth.php';

if (!isLoggedIn()) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>

    <p>This is the home page. You are now logged in.</p>

    <form action="logout.php" method="post">
        <input type="submit" value="Logout">
    </form>
    
</body>
</html>

