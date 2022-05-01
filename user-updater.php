<?php
    // Oracle Connection    
    $conn = oci_pconnect("gigi", "password", "localhost/XE");
    if (!$conn) {
        $m = oci_error();
        echo $m['message'], "\n";
        exit;
    }

    $userid = $_GET['user-id'];
    $userName = $_GET['name'];
    $email = $_POST['email'];

    $s = oci_parse($conn, "call EDIT_USER({$userid},'{$email}')");
    oci_execute($s);

    oci_close($conn);

    $loc = "Location: ./notes.php?user-id={$userid}&name={$userName}";
    header($loc);

?>