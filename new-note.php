<?php

    // Oracle Connection
    $conn = oci_pconnect("gigi", "password", "localhost/XE");
    if (!$conn) {
        $m = oci_error();
        echo $m['message'], "\n";
        exit;
    }

    $uid = $_GET['user-id'];
    $uname = $_GET['name'];
    $title = $_POST['title'];
    $date = $_POST['date'];
    $type = $_POST['type'];
    $comment = $_POST['comment'];


    echo $date;

    $s = oci_parse($conn, "call ADD_NOTE({$uid},'{$title}','{$date}','{$type}','{$comment}')");
    oci_execute($s);

    oci_close($conn);

    $loc = "Location: ./notes.php?user-id={$uid}&name={$uname}";
    header($loc);
?>