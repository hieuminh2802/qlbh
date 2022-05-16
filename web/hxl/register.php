<?php require_once "connection.php" ?>
    <?php
     if(isset($_POST["register"])){
         $username = $_POST["username"];
         $password = $_POST["password"];
         $name = $_POST["name"];
         $email = $_POST["email"];
         if($username =="" ||$password ==""||$name ==""||$email =="")
         {
             echo'<script>alert("Bạn không được để trống thông tin")</script>';
        }else{
            $sql = "INSERT INTO users(username, password, fullname, email, createdate ) VALUES ( '$username', '$password', '$name', '$email', now())";
            mysqli_query($conn,$sql);
            echo'<script>alert("Bạn đã đăng ký thành công")</script>';
            }
        }
    ?>