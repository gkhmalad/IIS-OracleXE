<?php

    include 'DatabaseConnection.php';
    $conn = DatabaseConnection::getInstance()->getConnection();

    $noteid = $_POST['note-id'];
    $userid = $_GET['user-id'];
    $userName = $_GET['name'];

    $s = oci_parse($conn, "call DELETE_NOTE({$noteid})");
    oci_execute($s);

    oci_close($conn);

    $loc = "Location: ./notes.php?user-id={$userid}&name={$userName}";
    header($loc);
?>