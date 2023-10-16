<?php
// list all available items in ../../data/team.csv database
// TODO: Display information from chosen name from index on detail page
// Hide text from team.csv displaying on the page
require __DIR__ . '/team.php';

$teamMembers = getTeamMembers();

echo '<a href="create.php"><button>Create</button></a>';
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Member Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <form method="post" action="../team/detail.php">
        <?php
        $i = 0;
        foreach ($teamMembers as $teamMember) {
            ?>
            <button class="btn btn-primary" type="submit" name="team_member_index" value="<?php echo $i; ?>">
                <?php echo ($teamMember['Team member']) ?>
            </button>
            <?php
            $i++;
        }
        ?>
        <input type="hidden" name="selected_team_member_index" id="selected_team_member_index" value="">
    </form>


    <script>
        const buttons = document.querySelectorAll('button[name="team_member_index"]');
        const selectedTeamMemberIndexInput = document.getElementById('selected_team_member_index');
        buttons.forEach((button) => {
            button.addEventListener('click', () => {
                selectedTeamMemberIndexInput.value = button.value;
            });
        });
    </script>


</body>

</html>