<?php
    include 'DatabaseConnection.php';
    $conn = DatabaseConnection::getInstance()->getConnection();

    $userid = $_GET['user-id'];
    $userName = $_GET['name'];
    $email = $_POST['email'];

    $s = oci_parse($conn, "call EDIT_USER({$userid},'{$email}')");
    oci_execute($s);

    oci_close($conn);

    $loc = "Location: ./notes.php?user-id={$userid}&name={$userName}";
    header($loc);

?>