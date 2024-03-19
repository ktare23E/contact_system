<?php
    include_once '../../connection.php';

    if(isset($_POST['editButton'])){
        $contact_id = $_POST['edit_contact_id'];
        $name = mysqli_escape_string($conn, $_POST['edit_name']);
        $mobile_number = mysqli_escape_string($conn, $_POST['edit_mobile_number']);
        $email = mysqli_escape_string($conn, $_POST['edit_email']);


        //update contact query
        $updateQuery = "UPDATE user_contact SET name = '$name', mobile_number = '$mobile_number', email = '$email' WHERE contact_id = $contact_id";
        $runQUery = mysqli_query($conn,$updateQuery);

        if($runQUery){
            echo 'success';
        }else{
            echo 'error';
        }
    }
?>