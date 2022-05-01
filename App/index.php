<?php

include 'DatabaseConnection.php';
$conn = DatabaseConnection::getInstance()->getConnection();

$s = oci_parse($conn, 'select * from USERS');
oci_execute($s);

$myString = "";

while (($row = oci_fetch_row($s)) != false) {
    $myString .= "<a href='./notes.php?user-id={$row[0]}&name={$row[1]}'><span>" . $row[1] . "    " . $row[2] . "</span></a><br>";
}

oci_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" type="text/css" href="./css/index-style.css" /> -->
    <title>Choose User</title>
</head>

<body>
    <div id="main-container">

        <div id="top-bar">
            <h1>TAKING NOTES</h1>
        </div>

        <div id="middle-container">

            <div id="choice-panel">

                <div id="title">
                    <h1 id="main-header">
                        Choose a User
                    </h1>
                </div>

                <div id="choices">
                    <?php echo $myString; ?>
                    <a href="./register.php"><button>New User</button></a>
                </div>

            </div>

        </div>



    </div>

</body>

</html>