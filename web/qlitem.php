<?php
	session_start(); 
 ?>
     <?php 
        require_once("connection.php");
     ?>
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
    <?php
        $sql = "select * from cart";
        $query = mysqli_query($conn,$sql);
    ?>
    <?php
        if (isset($_GET["id_delete"])) {
            $sql = "DELETE FROM cart WHERE id = ".$_GET["id_delete"];
            mysqli_query($conn,$sql);
            header('Location:qlitem.php');
        }      
    ?>
    <?php
        if(isset($_GET["add"]) && !empty(["search"] !="")){
            $tk = $_GET["search"];
                
            $sql = "SELECT * FROM cart WHERE itemname LIKE '%$tk%' ";
            $query =mysqli_query($conn,$sql);
            $num = mysqli_num_rows($query);
            if ($num > 0) {
            } 
            else {
                echo'<script>alert("Không tìm thấy kết quả")</script>';
            }
        }
    ?>
    <!-- start header -->
    <div class="p-3 mb-3 bg-success bg-opacity-50 text-white border-bottom">
        <div class="container">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

            <a href="mainpage.php" class="d-flex align-items-center mb-2 mb-lg-0">
            <img src="img/logo1.png" width="40" height="32"  alt="">
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li><a href="mainpage.php" class="nav-link px-2 fw-bold link-dark">Trang chủ</a></li>
              <li><a href="#" class="nav-link px-2 link-dark fw-bold">Sản phẩm</a></li>
              <li>
                <div>
                  <a href="qlitem.php" class="nav-link px-2 link-dark fw-bold dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">Quản lý</a>
                    <ul class="dropdown-menu bg-success">
                      <li><a class="dropdown-item" href="qltv.php">Quản lý tài khoản</a></li>
                    </ul>
              </div>
              </li>
              <li><a href="#" class="nav-link px-2 link-dark fw-bold">Blog</a></li>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
              <input type="search" class="form-control" placeholder="Nhập từ khoá ..." aria-label="Search">
            </form>

          <div class="dropdown text-end">
            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="img/avt.png" alt="mdo" width="32" height="32" class="rounded-circle">
            </a>
            <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
              <li><a class="dropdown-item" href="#">Cài đặt</a></li>
              <li><a class="dropdown-item" href="qltv.php">Thông tin người dùng</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="index.php">Đăng xuất</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- end header -->
    <h2 class="title text-center fw-bold" >Quản lý sản phẩm</h2>
    <div class="col-md-12 bg-success bg-opacity-50" ">
        <div class="search">
            <form action="" method="GET" class="form">
                <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label fw-bold">Điền từ khoá </label>
                    <div class="input-group mb-3">
                        <input type="text" id="search" name="search" class="form-control" placeholder="Nhập từ khoá tìm kiếm ...." >
                        <button class="btn btn-outline-secondary btn-warning" name="add">Tìm kiếm <i class="bi bi-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <td>
            <a href="additem.php">
                <button class='btn btn-success btn-block'>Thêm sản phẩm <i class="bi bi-plus"></i></button>
            </a>
        </td>
        <table class="table table-bordered table-striped">
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Mô tả</th>
                <th>Giá</th>
                <th>Hình ảnh</th>
                <th>Hành động</th>
            </tr>
                <?php
                while ($data = mysqli_fetch_array($query)){
                    $i =1;
                    $id = $data['id'];
                ?>
                <tr>
                    <td><?php echo $id ?></td>
                    <td><?php echo $data['itemname'] ?></td>
                    <td><?php echo $data['info'] ?></td>
                    <td><?php echo $data['price'] ?></td>
                    <td><img src="<?=$data['image']?>" style='height: 200px;'></td>
                    <td>
                        <a href="sitem.php?id=<?php echo $id;?>">
                         <button class='btn btn-success btn-block'><i class="bi bi-pencil-square"></i></button>
                        </a>
                        <a href="qlitem.php?id_delete=<?php echo $id;?>">
                         <button class='btn btn-danger btn-block'><i class="bi bi-trash"></i></button>
                        </a>
                    </td>
                </tr>
            <?php
                $i++;
                }
            ?>
        </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>