<?php
    include_once '../connection.php';

    $email = $_POST['email'];

    // //check if input is email
    // if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    //     echo 'invalid';
    //     exit();
    // }

    //retrieve email
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0){
        echo 'taken';
    }else{
        echo 'not_taken';
    }
?>