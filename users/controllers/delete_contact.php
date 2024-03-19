<?php
    include_once '../../connection.php';
    $contact_id = $_POST['contact_id']; 

    //delete contact query
    $sql = "DELETE FROM user_contact WHERE contact_id = $contact_id";
    $runQuery = mysqli_query($conn,$sql);

    if($runQuery){
        echo 'success';
    }else{
        echo 'failed';
    }
?>