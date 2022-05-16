<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style1.css">
    <title>Document</title>
</head>
<body>
    <?php require_once("connection.php") ?>
    <?php
        if(isset($_POST["login"])){
            $username = $_POST["username"];
            $password = md5($_POST["password"]);
            $username = strip_tags($username);
            $username = addslashes($username);
            $password = strip_tags($password);
            $password = addslashes($password);
            if ($username == "" || $password =="") {
                echo'<script>alert("Không được để trống tên đăng nhập hoặc mật khẩu!")</script>';
            }else{
                $sql = "select * from users where username = '$username' and password = '$password' ";
                $query = mysqli_query($conn,$sql);
                $num_rows = mysqli_num_rows($query);
                if ($num_rows==0) {
                    echo'<script>alert("tên đăng nhập hoặc mật khẩu không đúng !")</script>';
                }else{
			    header('location:mainpage.php');
            }
        }
    }
    ?>
    <?php
		if(isset($_POST["dangnhap"])){
			$tk = $_POST["user_name_lg"];
			$mk = md5($_POST["passlg"]);
			$rows = mysqli_query($connect,"
				select * from user where user_name = '$tk' and password = '$mk'
			");
			$count = mysqli_num_rows($rows);
			if($count==1){
				$_SESSION["loged"] = true;
				header("location:index.php");
				setcookie("success", "Đăng nhập thành công!", time()+1, "/","", 0);
			}
			else{
				header("location:index.php");
				setcookie("error", "Đăng nhập không thành công!", time()+1, "/","", 0);
			}
			
		}
	?>
    <div class="wrapper">
        <img src="logo.png" alt="">
        <h2 class="title">Đăng nhập</h2>
        <form action="" method="post" class="form">
            <div class="input-field">
                <label for="username" class="input-label">Tên tài khoản : </label>
                <input type="text" id="username" name="username" class="input" placeholder="Điền tên tài khoản">
            </div>
            <div class="input-field">
                <label for="password" class="input-label">Mật khẩu : </label>
                <input type="password" id="password" name="password" class="input" placeholder="Điền mật khẩu">
            </div>
           <button class="btn" name="login">Đăng nhập</button>         
           <p>Bạn chưa có tài khoản! <a href="register.php">Đăng ký ngay</a></p>
        </form>
    </div>
</body>
</html>