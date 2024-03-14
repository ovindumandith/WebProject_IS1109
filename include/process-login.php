<?php 

    if(isset($_POST['submit'])){
        $Email = $_POST['email'];
        $Password = $_POST['password'];
        // $login_check = false;

        $query = "SELECT * FROM userdetails WHERE email='{$Email}'";

        $result_set = mysqli_query($connection, $query);

        while($record =  mysqli_fetch_assoc($result_set)){
            if($record['password'] == $Password) {
                header("Location: ../index.html");
            }   
        }

        echo "<script> alert('Your login failed! Username or password is incorrect'); </script>";    
    }

    
    
?>