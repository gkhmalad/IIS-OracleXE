<?php 

    // Oracle Connection
    $conn = oci_pconnect("gigi", "password", "localhost/XE");
    if (!$conn) {
        $m = oci_error();
        echo $m['message'], "\n";
        exit;
    }

    $userid = $_GET['user-id'];

    $s = oci_parse($conn, "call DELETE_USER({$userid})");
    oci_execute($s);

    oci_close($conn);

    $loc = "Location: ./index.php";
    header($loc);
?>