<?php
    if(isset($_POST["btn"])){
        Sendmail();
    }
    function Sendmail(){
        require "PHPMailer-master/src/PHPMailer.php"; 
        require "PHPMailer-master/src/SMTP.php"; 
        require 'PHPMailer-master/src/Exception.php';

        $mail = new PHPMailer\PHPMailer\PHPMailer(true);

        try{
            $mail->SMTPDebug = 0; //0,1,2: chế độ debug. khi chạy ngon thì chỉnh lại 0 nhé
            $mail->isSMTP();  
            $mail->CharSet  = "utf-8";
            $mail->Host = 'smtp.gmail.com';  //SMTP servers
            $mail->SMTPAuth = true; // Enable authentication
            $mail->Username = 'nminhhieu2802@gmail.com'; // SMTP username
            $mail->Password = 'rnxrzuojzugephrj';   // SMTP password
            $mail->SMTPSecure = 'tls';  // encryption TLS/SSL 
            $mail->Port = 587;  // port to connect to                
            $mail->setFrom('nminhhieu2802@gmail.com', 'Mail' ); 
            $mail->addAddress('hieuhangkhong@gmail.com', 'Hiếu Minh'); //mail và tên người nhận  
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
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylesm.css">
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
    <form action="" method="post" class="form">
        <h3>Thông tin Email</h3>
        <div class="input-field">
            <label class="input-label">Email người gửi</label>
            <input type="email" class="input" name="email" placeholder="Nhập email .....">
        </div>
        <div class="input-field">
            <label class="input-label">Nội dung</label>
            <input type="text" class="inputnd" name="text" >
        </div>
        <div class="input-field">
            <button name="btn" type="submit" class="btn">Gửi email</button>
        </div>
        <a href="qltv.php">Quay lại trang chủ !!!</a>
    </form>
    </div>
</body>
</html>