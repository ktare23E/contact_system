<?php
    session_start();
    include_once '../../connection.php';
    include_once 'functionHTML.php';
    $user_id = $_SESSION['user_id'];

    if(isset($_POST['get_contacts'])){
        $pageNumber = $_POST['pageNumber'];

        //offset used to query
        $offset = ($pageNumber - 1) * 10;

        //retrieve query
        $retrieveContact = "SELECT * FROM user_contact WHERE user_id = $user_id ORDER BY name";
        $runRetrieveContact = mysqli_query($conn,$retrieveContact);
        $numRows = mysqli_num_rows($runRetrieveContact);


        //pagination query purposes
        $sqlContact = "SELECT * FROM user_contact WHERE user_id = $user_id ORDER BY name LIMIT $offset,10";
        $runSQLContact = mysqli_query($conn,$sqlContact);

        $contacts = [];
        if(mysqli_num_rows($runSQLContact) > 0){
            while($row = mysqli_fetch_assoc($runSQLContact)){
                $contacts[] = $row;
            }
        }
        
        //get the total number of rows using the numRows variable
        $totalRows = $numRows;
        
        //return total number of pages
        $totalPages = ceil($totalRows / 10); 

        //used the function for less code
        htmlFormat($totalRows,$contacts,$pageNumber,$totalPages,'changePage','nextPage','prevPage','retrieveContactData','deleteContact');

    }
?>