<?php
    $form = <<<EOD
    <form action="./new-note.php?user-id={$_GET["user-id"]}&name={$_GET['name']}" method="post">
            Title: <input type="text" name="title"><br>
            Date: <input type="date" name="date"><br>
            Type: <input type="text" name="type"><br>
            Comment: <input type="text" name="comment"><br>
            <input type="submit" value="Create">
    </form>
    EOD;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Note</title>
</head>
<body>
    <?php echo $form;?>
</body>
</html>