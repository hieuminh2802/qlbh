<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- FA -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!-- Bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
</head>

<body>
    <style>
    .product {
        border: 1px solid #333;
        background-color: #f1f1f1;
        border-radius: 5px;
        padding: 16px;
        margin: 20px;
    }
    </style>
    <?php require_once("connection.php")?>
    <?php
    if(isset($_POST['addtocart'])){
        if(isset($_SESSION['cart'])){

            $session_array_id = array_column($_SESSION['cart'],"id");


            if(!in_array($_GET['id'],$session_array_id)){

                $session_array = array(
                    'id' => $_GET['id'],
                    "itemname" =>$_POST['itemname'],
                    "price" =>$_POST['price'],
                    "quantiny" =>$_POST['quantiny']
                );
                $_SESSION['cart'][]=$session_array;
            }
        }else{
            
            $session_array = array(
                'id' => $_GET['id'],
                "itemname" => $_POST['itemname'],
                "price" => $_POST['price'],
                "quantiny" => $_POST['quantiny'] 
            );
            $_SESSION['cart'][]= $session_array;
        }
    }
    ?>
    <?php
        if(isset($_GET['action'])){
            if($_GET['action']=="clearall"){
                unset($_SESSION['cart']);
            }
            if($_GET['action']=="remove"){

                foreach($_SESSION['cart'] as $key => $value){
                    if($value['id']== $_GET['id']){
                        unset($_SESSION['cart'][$key]);
                    }
                }
            }
        }
    ?>
    <!-- start header -->
    <div class="p-3 mb-3 bg-success bg-opacity-50 text-white border-bottom">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

                <a href="mainpage.php" class="d-flex align-items-center mb-2 mb-lg-0">
                    <img src="img/logo1.png" width="40" height="32" alt="">
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="mainpage.php" class="nav-link px-2 fw-bold link-dark">Trang chủ</a></li>
                    <li><a href="#" class="nav-link px-2 link-dark fw-bold">Sản phẩm</a></li>
                    <li>
                        <div>
                            <a href="qlitem.php" class="nav-link px-2 link-dark fw-bold dropdown-toggle "
                                data-bs-toggle="dropdown" aria-expanded="false">Quản lý</a>
                            <ul class="dropdown-menu bg-success">
                                <li><a class="dropdown-item" href="qltv.php">Quản lý tài khoản</a></li>
                                <li><a class="dropdown-item" href="qlitem.php">Quản lý sản phẩm</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="#" class="nav-link px-2 link-dark fw-bold">Blog</a></li>
                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                    <input type="search" class="form-control" placeholder="Nhập từ khoá ..." aria-label="Search">
                </form>

                <div class="dropdown text-end">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="img/avt.png" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#">Cài đặt</a></li>
                        <li><a class="dropdown-item" href="qltv.php">Thông tin người dùng</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="index.php">Đăng xuất</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- end header -->
    <div class="container-fluid">
        <div class="col-md-12 bg">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="text-center fw-bold ">Sản phẩm nổi bật</h2>
                    <div class="col-md-12">
                        <div class="row">
                            <?php
                                $sql = "SELECT * FROM cart";
                                $result = mysqli_query($conn,$sql);

                                while($row = mysqli_fetch_array($result)){?>
                            <div class="col-md-6">

                                <form action="cart.php?id=<?=$row['id']?>" method="post">
                                    <div class="product">
                                        <img src="<?=$row['image']?>" class="rounded mx-auto d-block"
                                            style='height: 200px;'>
                                        <h5 class="text-center "><?= $row['itemname']; ?></h5>
                                        <h6 class="text-center"><?= $row['info']; ?></h6>
                                        <h5 class="text-center"><?=number_format($row['price']); ?></h5>
                                        <input type="hidden" name="itemname" value="<?= $row['itemname']; ?>">
                                        <input type="hidden" name="price" value="<?= $row['price']; ?>">
                                        <input type="number" name="quantiny" value="1" min="1" class="form-control">
                                        <div class="d-grid gap-2">
                                            <button type="submit" name="addtocart"
                                                class="btn btn-success btn-block my-2">Thêm vào giỏ hàng <i
                                                    class="bi bi-cart-plus"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <h2 class="title text-center">Giỏ hàng</h2>
                    <?php
                        $total= 0;
                        $output = "";
                        $output .="
                        <table class='table table-striped table-hover text-center'>
                        <tr>
                            <th>Mã sản phẩm</th>
                            <th>Tên mặt hàng</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng giá</th>
                            <th>Hành động</th>
                        </tr>
                        ";

                    if(!empty($_SESSION['cart'])){

                                foreach($_SESSION['cart'] as $key => $value){
                                    $output .="
                                    <tr>
                                        <td>".$value['id']."</td>
                                        <td>".$value['itemname']."</td>
                                        <td>".$value['price']."</td>
                                        <td>".$value['quantiny']."</td>
                                        <td>".number_format($value['price'] * $value['quantiny'])."</td>
                                        <td>
                                            <a href='cart.php?action=remove&id=".$value['id']."'>
                                            <button class='btn btn-danger btn-block'>xoá</button>
                                            </a>
                                        </td>
                                    ";
                                    $total = $total + $value['quantiny'] * $value['price'];

                                }
                                $output .="
                                <tr>
                                    <td colspan='3' ></td>
                                    <td></b>Tổng giá</b></td>
                                    <td>".number_format($total)."</td>
                                    <td>
                                        <a href='cart.php?action=clearall'>
                                        <button class='btn btn-warning'>Xoá tất cả</button>
                                        </a>
                                    </td>
                                </tr>
                                ";
                            }
                            echo $output; 
                    ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>