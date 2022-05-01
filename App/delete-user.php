<?php 

    include 'DatabaseConnection.php';
    $conn = DatabaseConnection::getInstance()->getConnection();

    $userid = $_GET['user-id'];

    $s = oci_parse($conn, "call DELETE_USER({$userid})");
    oci_execute($s);

    oci_close($conn);

    $loc = "Location: ./index.php";
    header($loc);
?>