<?php
    include_once '../connection.php';

    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if($password == $confirm_password){
        echo 'success';
    }else{
        echo 'error';
    }
?>