<?php
    session_start();
    # connect to db
    include 'Dbconnection.php';
    $con = OpenCon();

    $bname = $_POST['businessname'];
    $sname = $_POST['service'];
    

    mysqli_autocommit($con,FALSE);
    $query="INSERT INTO loginbusiness (businessname,service) VALUES ('$bname','$sname')";
    mysqli_query($con,$query);
    echo "Data inserted Successfully..!!";

    # commit
    mysqli_commit($con);

    #close connection
    CloseCon($con);
?>
