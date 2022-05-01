<?php

    // Oracle Connection
    $conn = oci_pconnect("gigi", "password", "localhost/XE");
    if (!$conn) {
        $m = oci_error();
        echo $m['message'], "\n";
        exit;
    }

    $userid = $_GET['user-id'];

    $s = oci_parse($conn, 'select * from USERS where '.$userid.' = USER_ID');
    oci_execute($s);

    $myString = "";
    
    while(($row = oci_fetch_row($s)) != false) {
        $myString .= <<<EOD
        <form action="./user-updater.php?user-id={$userid}&name={$row[1]}" method="post">
            First Name: <input type="text" name="first-name" value='{$row[1]}' disabled><br>
            Last Name: <input type="text" name="last-name" value='{$row[2]}' disabled><br>
            E-mail: <input type="email" name="email" value='{$row[3]}'><br>
            <input type="submit" value="Update">
        </form>
        EOD;
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <div id="main-container">
        <?php echo $myString; ?>
    </div>
</body>
</html>