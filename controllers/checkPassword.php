<?php
    include_once '../connection.php';
    $password = $_POST['password'];

    //check if password length is al least 8
    if(strlen($password) < 8){
        echo 'error';
    
    //check password pattern if it does contain one uppercase from A-Z
    }else if(!preg_match('/[A-Z]/', $password)){
        echo 'error';

    //check password pattern if it does contain one numeric number from 0-9
    }else if(!preg_match('/[0-9]/', $password)){
        echo 'error';
    
    //if it meets all the condition it will echo a success
    }else{
        echo 'success';
    }
?>