<?php
// Oracle Connection
    $conn = oci_pconnect("gigi", "password", "localhost/XE");
    if (!$conn) {
        $m = oci_error();
        echo $m['message'], "\n";
        exit;
    }

    $noteid = $_GET['note-id'];
    $userid = $_GET['user-id'];
    $userName = $_GET['name'];
    
    $s = oci_parse($conn, 'select * from NOTES where '.$noteid.' = NOTE_ID');
    oci_execute($s);
    $myString = "";
    
    while(($row = oci_fetch_row($s)) != false) {
        $myString .= <<<EOD
        <form action="./updater.php?user-id={$userid}&name={$userName}" method="post">
        <input type="hidden" name="note-id" value="{$noteid}">
        Title: <input type="text" name="title" value='{$row[2]}'><br>
        Date: <input type="date" name="date" value={$row[3]}><br>
        Type: <input type="text" name="type" value='{$row[4]}'><br>
        Comment: <input type="text" name="comment" value='{$row[5]}'><br>
        <input type="submit" value="Update">
        </form><br>
        EOD;
    }

    oci_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Note</title>
</head>
<body>
    <?php echo $myString; ?>
</body>
</html>