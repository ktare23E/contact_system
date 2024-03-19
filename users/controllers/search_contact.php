<?php
    session_start();
    include_once '../../connection.php';
    include_once 'functionHTML.php';
    $user_id = $_SESSION['user_id'];

    if(isset($_POST['is_search'])){
        $search_contact = mysqli_escape_string($conn, $_POST['search_contact']);
        $pageNumber = $_POST['pageNumber'];

        $offset = ($pageNumber - 1) * 10;

        $columns = [];

        //retrieve user_contact column name
        $sqlGetColumnNames = "SELECT column_name FROM information_schema.columns WHERE table_name = 'user_contact'";
        $runSQLGetColumnNames = mysqli_query($conn,$sqlGetColumnNames);

        if($runSQLGetColumnNames){
            while($row = mysqli_fetch_assoc($runSQLGetColumnNames)){
                $columns[] = $row['column_name'];
            }
        }

        //search user_contact query using dynamic column name
        $searchContactQuery = "SELECT * FROM user_contact WHERE user_id = $user_id AND (";
        foreach($columns as $column){
            $searchContactQuery  .=  "$column LIKE '%$search_contact%' OR ";
        }
        
        //trim the excessive OR using rtrim
        $searchContactQuery = rtrim($searchContactQuery," OR ");
        $searchContactQuery .= ")";
        $runSearchQuery = mysqli_query($conn,$searchContactQuery);
        $numRows = mysqli_num_rows($runSearchQuery);

        //retrieve total number rows 
        $totalRows = $numRows;

        //total Pages and 10 person or contact per page
        $totalPages = ceil($totalRows / 10);

        //search pagination query
        $searchContactQuery .= " ORDER BY name LIMIT $offset,10";
        $resultSearchQuery = mysqli_query($conn,$searchContactQuery);

        $contacts = [];

        if(mysqli_num_rows($resultSearchQuery) > 0){
            while($row = mysqli_fetch_assoc($resultSearchQuery)){
                $contacts[] = $row;
            }
        }

        htmlFormat($totalRows,$contacts,$pageNumber,$totalPages,'searchChangePage','searchNextPage','searchPrevPage','retrieveContactData','deleteContact');


    }
?>