<?php
    session_start();
    include_once '../../connection.php';
    $user_id = $_SESSION['user_id'];

    if(isset($_POST['submit'])){
        $name = mysqli_escape_string($conn,$_POST['name']);
        $email = mysqli_escape_string($conn,$_POST['email']);
        $mobile_number = mysqli_escape_string($conn,$_POST['mobile_number']);

        $errors = [];

        if(empty($name)){
            $errors[] = 'Please enter a name';
        }

        if(empty($email)){
            $errors[] = 'Please enter an email.';
        }


        //check if email is valid format
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors[] = 'Please use a valid email.';
        }


        if(empty($mobile_number)){
            $errors[] = "Please enter a mobile number";
        }

        if(empty($errors)){
            //insert query
            $insert_contact = "INSERT INTO user_contact (user_id,name,email,mobile_number) VALUES($user_id,'$name','$email','$mobile_number')";
            $runQuery = mysqli_query($conn,$insert_contact);

            if($runQuery){
                echo 'success';
            }
        }else{
            echo json_encode($errors);
        }
    }
?>