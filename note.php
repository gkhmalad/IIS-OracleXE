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
        $myString .= $row[2];
        $myString .= "<br>";
        $myString .= $row[3];
        $myString .= "<br>";
        $myString .= $row[4];
        $myString .= "<br>";
        $myString .= $row[5];
        $myString .= "<br>";
        $myString .= <<<EOD
        <a href='./update-note.php?note-id={$noteid}&user-id={$userid}&name={$userName}'><button>Edit</button></a>
        EOD;
        $myString .= <<<EOD
        <form action="./note-remove.php?user-id={$userid}&name={$userName}" method="post">
        <input type="hidden" name="note-id" value="{$noteid}">
        <input type="submit" value="Delete">
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
    <title>Document</title>
</head>
<body>

    <div id="main-container">
        <?php echo $myString; ?>
    </div>
    
</body>
</html>