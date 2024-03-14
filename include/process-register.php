<?php
    if(isset($_POST['create'])){

        $Firstname = $_POST['firstname'];
        $Lastname = $_POST['lastname'];
        $Email = $_POST['email'];
        $Age = $_POST['age'];
        $Password = $_POST['password'];
    
        $query = "INSERT INTO userdetails (firstName,lastName,email,age,password) VALUES ('{$Firstname}','{$Lastname}','{$Email}','{$Age}','{$Password}')";
    
        $result = mysqli_query($connection,$query);
    
        if ($result){
            echo "<script> alert('Your account created succesfully'); </script>";
        }
        else{
            echo "<script> alert('Account creation failed!'); </script>";
        }       
    }
?>