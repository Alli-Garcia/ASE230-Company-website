<?php
// list all available items in ../../data/team.csv database
require __DIR__ . '/team.php';

$teamMembers = getTeamMembers();

echo '<a href="create.php"><button>Create</button></a>';
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Member Index</title>
</head>

<body>
    <form method="post" action="../team/detail.php">

        <?php
        $i = 0;
        foreach ($teamMembers as $teamMember) {
            ?>

        <button class="btn btn-primary" type="submit " name="Team member" value="<?php echo $i; ?>">
            <?php echo ($teamMember['Team member'])?>
        </button>

        <?php
            $i++;
        }
        ?>


</body>

</html>