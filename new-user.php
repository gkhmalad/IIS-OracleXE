<?php

    include 'DatabaseConnection.php';
    $conn = DatabaseConnection::getInstance()->getConnection();

    $fname = $_POST['first-name'];
    $lname = $_POST['last-name'];
    $email = $_POST['email'];

    $s = oci_parse($conn, "call ADD_USER('{$fname}','{$lname}','{$email}')");
    oci_execute($s);
    
    header('Location: ./index.php');

    oci_close($conn);
?>
