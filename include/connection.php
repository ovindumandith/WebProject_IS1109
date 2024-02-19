<?php 

    $connection = mysqli_connect('localhost','root','','appex');

    //Connection checking-------
    if (mysqli_connect_errno()) {
        die('Database connection failed' . mysqli_connect_errno());
    }
    else {
        // echo "Database connection successful";
    }

?>