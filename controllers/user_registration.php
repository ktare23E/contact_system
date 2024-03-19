<?php
    include_once '../connection.php';
    session_start();


    if(isset($_POST['submit'])){

        //escape special characters, if any
        $first_name = mysqli_escape_string($conn,$_POST['first_name']);
        $last_name = mysqli_escape_string($conn,$_POST['last_name']);
        $email = mysqli_escape_string($conn,$_POST['email']);
        $password = mysqli_escape_string($conn,$_POST['password']);
        $confirm_password = mysqli_escape_string($conn,$_POST['confirm-password']);
        
        
        $errors = [];

        //validate first name and last name
        if(empty($first_name)){
            //append the error to the error array variable
            $errors[] = 'First name is required';
        }

        if(empty($last_name)){
            $errors[] = 'Last name is required';
        }


        //validate email
        if(empty($email)){
            $errors[] = 'Email is required';
        }  
        
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors[] = 'Invalid email format';
        }

        //check if email already exist in database
        $checkEmailQuery = "SELECT * FROM users WHERE email = '$email'";
        $resultQuery = mysqli_query($conn,$checkEmailQuery);

        if($resultQuery){
            if(mysqli_num_rows($resultQuery) > 0){
                $errors[] = 'Email already exist';
            }
        }
        

        //validate password
        if(empty($password)){
            $errors[] = "Password is required";
        }

        //check if password contains big letter and number and length of password
        if(strlen($password) <= 5 ){
            $errors[] = "Password must have at least 5 characters";
        }

        if(!preg_match('/[A-Z]/', $password) ){
            $errors[] = "Password must have at least 1 uppercase character";
        }

        if(!preg_match('/[0-9]/', $password)){
            $errors[] = "Password must have at least 1 number character (0-9)";
        }

        if(empty($confirm_password)){
            $errors[] = "Confirmation Password is required";
        }

        //check if password and confirmation password is the same
        if($password != $confirm_password){
            $errors[] = "Password and confirmation password does not match";
        }

        if($password === $confirm_password){
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        }

        if(empty($errors)){
            //insert into the database
            $sql = "INSERT INTO users (first_name,last_name,email,password)
                                VALUES('$first_name','$last_name','$email','$hashed_password')";
            $runQuery = mysqli_query($conn,$sql);

            if($runQuery){
                //retrieve user credentials
                $retrieveUserData = "SELECT * FROM users WHERE email = '$email'";
                $runRetrieveQuery = mysqli_query($conn,$retrieveUserData);

                if($runRetrieveQuery){
                    $userDataRow = mysqli_fetch_assoc($runRetrieveQuery);
                    $_SESSION['user_id'] = $userDataRow['user_id'];
                    $_SESSION['is_logged_in'] = 1;
                    header('location:../thank_you.php?success');
                }
            }
        }else{
            $errorData = json_encode($errors);
            header("location:../register.php?errors=".urlencode($errorData));
        }

    }else{
        echo 'error';
    }

?>