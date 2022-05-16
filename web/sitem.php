<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- FA -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!-- Bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <?php require_once("connection.php");?>
    <?php
        if(isset($_GET["id"])){
            $id = $_GET["id"];
        }
    ?>
    <?php
        if(isset($_POST["change"])){
                $itemname = $_POST["itemname"];
                $info = $_POST["info"];
                $price = $_POST["price"];
                $image = $_POST["image"];
                if($itemname == ""){
                    echo'<script>alert("Bạn không được để trống tên sản phẩm")</script>';
                }
                if($info == ""){
                    echo'<script>alert("Bạn không được để trống mô tả sản phẩm")</script>';
                }
                if($price == ""){
                    echo'<script>alert("Bạn không được để trống giá sản phẩm")</script>';
                }
                if($image == ""){
                    echo'<script>alert("Bạn không được để trống hình ảnh sản phẩm")</script>';
                }
                if($itemname !=="" && $info !=="" && $price !=="" && $image !==""){
                $sql = "UPDATE cart SET itemname = '$itemname', info ='$info' , price = '$price', image ='img/$image'  WHERE id = '$id'";
                mysqli_query($conn,$sql);
            }
            header('Location:qlitem.php');
        }
    ?>
    <div class="container">
        <h3 class="text-center">Thay đổi thông tin sản phẩm</h3>
        <form class="" method="POST">
            <div class="mb-3">
                <label for="itemname" class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" id="itemname" name="itemname" placeholder="Nhập tên sản phẩm .....">
            </div>

            <div class="mb-3">
                <label for="info" class="form-label">Mô tả</label>
                <textarea name="info" id="info" class="form-control" aria-label="With textarea" placeholder="Mô tả sản phẩm....."></textarea>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Giá</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="Nhập giá sản phẩm .....">
            </div>
            <div class="mb-3">
                <input type="file" class="form-control" name="image" id="image">
                <div class="invalid-feedback">Vui lòng chọn tệp</div>
            </div>
            <div class="">
                <button class="btn btn-success" name="change">Thay đổi thông tin</button>
            </div>
        </form>
    </div>
</body>
</html>