<?php
    include_once '../connection.php';

    $email = $_POST['email'];

    //retrieve email
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);
    

    //check email if already existed
    if(mysqli_num_rows($result) > 0){
        echo 'taken';
    }else{
        echo 'not_taken';
    }
?>