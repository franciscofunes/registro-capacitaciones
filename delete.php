<?php 
    require_once 'db/conn.php';
    if(!$_GET['id']){
        include 'includes/errormessage.php';
        header("Location: viewrecords.php");
    } else {
        //get ID VALUES
        $id = $_GET;
        //call Delete function
        $result = $crud->deleteAttendee($id);
        //redirect to list
        if($result)
        {
            header("Location: viewrecords.php");
        }else {
            include 'includes/errormessage.php';
        }
    }
?>