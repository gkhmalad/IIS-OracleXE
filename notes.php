<?php 
    include 'DatabaseConnection.php';
    $conn = DatabaseConnection::getInstance()->getConnection();

    $userid = $_GET['user-id'];

    $addNote = "<a href='./add-note.php?user-id={$userid}&name={$_GET['name']}'><button>Add Note</button></a>";

    $editUser= "<a href='./edit-user.php?user-id={$userid}'><button>Edit</button></a>";

    $remove = "<a href='./delete-user.php?user-id={$userid}'><button>Remove</button></a><br>";
    
    
    $s = oci_parse($conn, 'select * from NOTES where '.$userid.' = USER_ID');
    oci_execute($s);
    $myString = "";
    
    while(($row = oci_fetch_row($s)) != false) {
        $myString .= "<a href='./note.php?note-id={$row[0]}&user-id={$userid}&name={$_GET['name']}'>";
        $myString .= $row[2];
        $myString .= "</a><br>";
        $myString .= $row[3];
        $myString .= "<br>";
        $myString .= $row[4];
        $myString .= "<br>";
        $myString .= $row[5];
        $myString .= "<br><br><br>";
    }

    oci_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes</title>
</head>
<body>

    <div id="main-container">
        <h1 id="title">
            <?php echo $_GET['name'];?>'s Notes
            <?php echo $addNote;?>
            <?php echo $editUser;?>
            <?php echo $remove;?>
        </h1>
        
        <div id="note-container">
            <?php echo $myString;?>
        </div>
    </div>
    
</body>
</html>