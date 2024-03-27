<?php
    include_once '../connection.php';
    session_start();

    //check if submit name is set
    if(isset($_POST['submit'])){
        $email = mysqli_escape_string($conn,$_POST['email']);
        $password = mysqli_escape_string($conn,$_POST['password']);

        //check user query
        $query = "SELECT * FROM users WHERE email = '$email'";
        $runQuery = mysqli_query($conn,$query);


        if(mysqli_num_rows($runQuery) > 0 ){
            $row = mysqli_fetch_assoc($runQuery);
        
            $hash_password = $row['password'];

            if(password_verify($password,$hash_password)){
                $_SESSION['is_logged_in'] = 1;
                $_SESSION['user_id'] = $row['user_id'];
                header('location: ../users/index.php');
            }else{
                header('location: ../index.php?prompt=Wrong password');
            }
        }
        else{
            header("location: ../index.php?prompt=Email doesn't exist.");
        }
    
    }
?>