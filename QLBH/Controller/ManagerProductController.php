<?php
    $server_username = "root";
    $server_password = "";
    $server_host = "localhost";
    $database = 'QLBH';

    $conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");
    mysqli_query($conn,"SET NAMES 'UTF8'");
?>

<?php
    session_start();
?>
<?php
        $msg="";
        $sql = "SELECT * FROM product";
        $query = mysqli_query($conn,$sql);
?>
<?php
        if (isset($_GET["id_delete"])) {
            $sql = "DELETE FROM product WHERE id = ".$_GET["id_delete"];
            mysqli_query($conn,$sql);
            header('Location:Product.php');
        }      
?>
<?php
        if(isset($_GET["add"]) && !empty(["search"] !="")){
            $tk = $_GET["search"];
                
            $sql = "SELECT * FROM Product WHERE itemname LIKE '%$tk%' ";
            $query =mysqli_query($conn,$sql);
            $num = mysqli_num_rows($query);
            if ($num > 0) {
            } 
            else {
                $msg ="<div class='alert alert-danger'>Không tìm thấy kết quả</div>";
            }
        }
?>
<?php
        if(isset($_GET["id"])){
            $id = $_GET["id"];
        }
    ?>
<?php
        if(isset($_POST["update"])){
                $itemname = $_POST["itemname"];
                $info = $_POST["info"];
                $price = $_POST["price"];
                $image = $_POST["image"];
                if($itemname == ""){
                     $msg = "<div class='alert alert-info'>Bạn không được để trống tên sản phẩm !!!</div>";
                }
                if($info == ""){
                     $msg = "<div class='alert alert-info'>Bạn không được để trống mô tả sản phẩm !!!</div>";
                }
                if($price == ""){
                    $msg = "<div class='alert alert-info'>Bạn không được để trống giá sản phẩm !!!</div>";
                }
                if($image == ""){
                     $msg = "<div class='alert alert-info'>Bạn không được để trống hình ảnh sản phẩm !!!</div>";
                }
                if($itemname !=="" && $info !=="" && $price !=="" && $image !==""){
                $sql = "UPDATE product SET itemname = '$itemname', info ='$info' , price = '$price', image ='img/$image'  WHERE id = '$id'";
                mysqli_query($conn,$sql);
            }
            header('Location:Product.php');
        }
    ?>
<?php
     $msg2="";
     if(isset($_POST["additem"])){
        $itemname = $_POST["itemname"];
        $info = $_POST["info"];
        $price = $_POST["price"];
        $image =$_POST["image"];
        
        if($itemname =="" ||$info ==""||$price ==""||$image =="")
        {
             $msg2 ="<div class='alert alert-danger'>Bạn không được để trống thông tin</div>";
        }else{
            $sql = "INSERT INTO Product(itemname,price,info,image) VALUES ( '$itemname','$price','$info','$image')";
            mysqli_query($conn,$sql);
            $msg2 ="<div class='alert alert-success'>Thêm sản phẩm thành công</div>";
            }
            header('Location:Product.php');
        }
    ?>