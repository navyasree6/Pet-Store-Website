<?php
    session_start();
    # connect to db
    include 'Dbconnection.php';
    $con = OpenCon();

    $cname = $_POST['clientname'];
    $pname = $_POST['mypet'];
    

    mysqli_autocommit($con,FALSE);
    $query="INSERT INTO loginclient (clientname,mypet) VALUES ('$cname','$pname')";
    mysqli_query($con,$query);
    echo "Data inserted Successfully..!!";

    # commit
    mysqli_commit($con);

    #close connection
    CloseCon($con);
?>
