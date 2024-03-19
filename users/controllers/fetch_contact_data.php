<?php
    include_once '../../connection.php';
    $contact_id = $_POST['contact_id'];

    //retrieve contact
    $retrieveContact = "SELECT * FROM user_contact WHERE contact_id = $contact_id";
    $runQuery = mysqli_query($conn,$retrieveContact);
    
    if($runQuery){
        $row = mysqli_fetch_assoc($runQuery);

        echo json_encode($row);
    }
?>