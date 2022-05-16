<?php
    session_start();
?>
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
    <?php 
        require_once("connection.php");
    ?>
    <?php
        if(isset($_GET["id"])){
            $id = $_GET["id"];
        }
    ?>
    <?php
        if(isset($_POST["change"])){
            $fullname = $_POST["fullname"];
            $email = $_POST["email"];
            $permision = $_POST["permision"];
            if($fullname == ""){
                echo"Bạn không được để trống tên";
            }
            if($email == ""){
                echo"Bạn không được để trống email";
            }
            if($fullname !=="" && $email !==""){
            $sql = "UPDATE users SET fullname = '$fullname',email ='$email' , permission = '$permission'  WHERE id = '$id'";
            mysqli_query($conn,$sql);
        }
        header('Location:qltv.php');
    }
    function make_permision_dropdown($id){
        $select_1 = "";
        $select_2 = "";
        if ($id == 0) {
            $select_1 = 'selected = "selected"';
        }
        if ($id == 1) {
            $select_2 = 'selected = "selected"';
        }
        $select = '<select id="permision" name="permision">
                        <option value="0" '.$select_1.'>Thành viên thường</option>
                        <option value="1" '.$select_2.'>Admin</option>
                    </select>';

        return $select;
    }
    ?>


    <div class="wrapper">
        <h2 class="title">Chỉnh sửa thông tin thành viên </h2>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <form action="" name="form" method="post">
            <div class="input-field">
                <label for="fullname" class="input-label">Tên đầy đủ</label>
                <input type="text" id="fullname" class="input" name="fullname" placeholder="Nhập tên ....">
            </div>
            <div class="input-field">
                <label for="email" class="input-label">Email</label>
                <input type="email" id="email" class="input" name="email" placeholder="Nhập email mới ...">
            </div>
            <div class="input-field">
                <Label for="permistion" class="input-label"> Quyền</Label>
                <?php echo make_permision_dropdown(['permision']); ?>
            </div>
            <button class="btn" name="change">Lưu thông tin</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>