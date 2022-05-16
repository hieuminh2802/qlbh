<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="css/style1.css">
</head>
<body>
<?php require_once "connection.php" ?>
    <?php
        require "PHPMailer-master/src/PHPMailer.php"; 
        require "PHPMailer-master/src/SMTP.php"; 
        require 'PHPMailer-master/src/Exception.php';

        if(isset($_POST["register"])){
            $username = $_POST["username"];
            $password =  md5($_POST["password"]);
            $rpassword = md5($_POST["rpassword"]);
            $fullname = $_POST["fullname"];
            $email = $_POST["email"];

            $mail = new PHPMailer\PHPMailer\PHPMailer(true);

            try{
                $mail->SMTPDebug = 0; //0,1,2: chế độ debug. khi chạy ngon thì chỉnh lại 0 nhé
                $mail->isSMTP();  
                $mail->CharSet  = "utf-8";
                $mail->Host = 'smtp.gmail.com';  //SMTP servers
                $mail->SMTPAuth = true; // Enable authentication
                $mail->Username = 'nminhhieu2802@gmail.com'; // SMTP username
                $mail->Password = 'rnxrzuojzugephrj';   // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYOTION_STARTTLS;  // encryption TLS/SSL 
                $mail->Port = 587;  // port to connect to                
                $mail->setFrom('nminhhieu2802@gmail.com', 'Mail' ); 
                $mail->addAddress($email, $fullname); //mail và tên người nhận  
                $mail->isHTML(true);  // Set email format to HTML
                $mail->Subject = 'Thông báo tuyển dụng';
                $noidungthu = "
                    <h3>Thư liên hệ từ nhà phỏng vấn</h3>
                    <p> Email người gửi: <br>{$_POST['email']} </p>
                    <p> Nội dung liên hệ: <br>{$_POST['text']} </p>
                ";
                $mail->Body = $noidungthu;
                $mail->smtpConnect( array(
                    "ssl" => array(
                        "verify_peer" => false,
                        "verify_peer_name" => false,
                        "allow_self_signed" => true
                    )
                ));
                $mail->send();
                echo '<script>alert("Đã gửi mail xong")</script>';
            } catch (Exception $e) {
                echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
            }

            if($password == $rpassword){
                $sql = "INSERT INTO users(username, password, fullname, email) VALUES ( '$username', '$password', '$name', '$email')";
                mysqli_query($conn,$sql);
                echo'<script>alert("Bạn đã đăng ký thành công")</script>';
                }else{
                    echo'<script>alert("Mật khẩu không trùng khớp")</script>';
                }
            }
    ?>
    <div class="wrapper">
        <h2 class="title">Đăng ký tài khoản</h2>
        <form action="" method="post" class="form">
            <div class="input-field">
                <label for="username" class="input-label">Tên tài khoản : </label>
                <input type="text" id="username" name="username" class="input" placeholder="Điền tên tài khoản">
            </div>
            <div class="input-field">
                <label for="password" class="input-label">Mật khẩu : </label>
                <input type="password" id="password" name="password" class="input" placeholder="Điền mật khẩu">
            </div>
            <div class="input-field">
                <label for="rpassword" class="input-label">Nhập lại mật khẩu : </label>
                <input type="password" name="rpassword" class="input" placeholder="Điền mật khẩu">
            </div>
            <div class="input-field">   
                <label for="name" class="input-label">Họ và tên : </label>
                <input type="name" id="name" name="fullname" class="input" placeholder="Điền Họ và tên">
            </div>
            <div class="input-field">   
                <label for="email" class="input-label">Email : </label>
                <input type="email" id="email" name="email" class="input" placeholder="Điền email">
            </div>
           <button class="btn" name="register">Đăng ký</button>         
           <p>Bạn đã có tài khoản! <a href="login.php">Đăng nhập</a></p>
        </form>
    </div>
    
</body>
</html>