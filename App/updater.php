<?php

    include 'DatabaseConnection.php';
    $conn = DatabaseConnection::getInstance()->getConnection();

    $noteid = $_POST['note-id'];
    $userid = $_GET['user-id'];
    $userName = $_GET['name'];
    $title = $_POST['title'];
    $date = $_POST['date'];
    $type = $_POST['type'];
    $comment = $_POST['comment'];

    $s = oci_parse($conn, "call EDIT_NOTE({$noteid},'{$title}','{$date}','{$type}','{$comment}')");
    oci_execute($s);

    oci_close($conn);

    $loc = "Location: ./notes.php?user-id={$userid}&name={$userName}";
    header($loc);
?>