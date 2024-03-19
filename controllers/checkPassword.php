<?php
    include_once '../connection.php';
    $password = $_POST['password'];

    //check if password length is al least 8
    if(strlen($password) < 8){
        echo 'error';
    }else if(!preg_match('/[A-Z]/', $password)){
        echo 'error';
    }else if(!preg_match('/[0-9]/', $password)){
        echo 'error';
    }else{
        echo 'success';
    }
?>