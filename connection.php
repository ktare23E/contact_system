<?php
    $conn = mysqli_connect('localhost','root','','user_contact');

    if(!$conn){
        die('Connection failed: '.mysqli_connect_error());
    }
    

?>