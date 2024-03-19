<?php
    include_once '../connection.php';
    session_start();

    if(isset($_POST['submit'])){
        $email = mysqli_escape_string($conn,$_POST['email']);
        $password = mysqli_escape_string($conn,$_POST['password']);

        //check user query
        $query = "SELECT * FROM users WHERE email = '$email'";
        $runQuery = mysqli_query($conn,$query);

        //retrieve admin
        $adminQuery = "SELECT * FROM admin WHERE admin_email = '$email'";
        $runAdminQuery = mysqli_query($conn,$adminQuery);

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

    
        } elseif(mysqli_num_rows($runAdminQuery) > 0){
            $adminRow = mysqli_fetch_assoc($runAdminQuery);
            $adminHashPassword = $adminRow['admin_password'];

            if(password_verify($password,$adminHashPassword)){
                $_SESSION['isAdmin'] = 1;
                $_SESSION['admin_id'] = $adminRow['admin_id'];
                header('location: ../admin/index.php');
            }else{
                header('location: ../index.php?prompt=Wrong password');
            }
        }
        else{
            header("location: ../index.php?prompt=Email doesn't exist.");
        }
    
    }
?>