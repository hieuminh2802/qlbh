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

  <link rel="stylesheet" href="css/index.css">

  <!-- FA -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">


  <!-- Bootstrap cdn -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
        .product{
            border:1px solid #333;
            background-color: #f1f1f1;
            border-radius:5px;
            padding :16px;
            margin: 20px;
        }
    </style>
    <?php require_once("connection.php")?>
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
    <!-- start main -->
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/banner4.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="img/banner5.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="img/banner6.png" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>



    <h2 class="text-center fw-bold ">Sản phẩm nổi bật</h2>
    <div class="container-fluid">
        <div class="col-md-12 bg-success bg-opacity-50">

                <div class="col-md-12">
                    <div class="row">     
                        <?php
                            $sql = "SELECT * FROM cart";
                            $result = mysqli_query($conn,$sql);

                            while($row = mysqli_fetch_array($result)){?>
                            <div class="col-md-3">
                                    
                              <form action="cart.php?id=<?=$row['id']?>" method="post">
                              <div class="product">
                                        <img src="<?=$row['image']?>" class="rounded mx-auto d-block" style='height: 200px;'>
                                        <h5 class="text-center "><?= $row['itemname']; ?></h5>
                                        <h6 class="text-center"><?= $row['info']; ?></h6>
                                        <h5 class="text-center"><?=number_format($row['price']); ?></h5>
                                        <input type="hidden" name="itemname" value="<?= $row['itemname']; ?>">
                                        <input type="hidden" name="price" value="<?= $row['price']; ?>">
                                        <input type="number" name="quantiny" value="1" min="1" class="form-control">
                                        <div class="d-grid gap-2">
                                            <button type="submit" name="addtocart" class="btn btn-success btn-block my-2">Thêm vào giỏ hàng <i class="bi bi-cart-plus"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                          <?php } ?>
                    </div>
                </div>
        </div>
    </div>
    <!-- end main -->
    <!-- footer -->
    <div class="container py-5">
      <div class="row ">
        <div class="col-12 col-md">
          <a href="index.php" class="d-flex align-items-center mb-2 mb-lg-0">
            <img src="img/logo1.png" width="40" height="32"  alt="">
          </a>
        </div>
        <div class="col-6 col-md">
          <h5>Chính sách</h5>
          <ul class="list-unstyled text-small">
            <li><a class="link-secondary" href="#">Giới thiệu về công ty</a></li>
            <li><a class="link-secondary" href="#">Câu hỏi thường gặp mua hàng</a></li>
            <li><a class="link-secondary" href="#">Chính sách bảo mật</a></li>
            <li><a class="link-secondary" href="#">Quy chế hoạt động</a></li>
            <li><a class="link-secondary" href="#">Kiểm tra hóa đơn điện tử</a></li>
            <li><a class="link-secondary" href="#">Tra cứu thông tin bảo hành</a></li>
          </ul>
        </div>
        <div class="col-6 col-md">
          <h5>Tuyển dụng</h5>
          <ul class="list-unstyled text-small">
            <li><a class="link-secondary" href="#">Tin tuyển dụng</a></li>
            <li><a class="link-secondary" href="#">Tin khuyến mãi</a></li>
            <li><a class="link-secondary" href="#">Hướng dẫn mua online</a></li>
            <li><a class="link-secondary" href="#">Hướng dẫn mua trả góp</a></li>
            <li><a class="link-secondary" href="#">Chính sách trả góp</a></li>
          </ul>
        </div>
        <div class="col-6 col-md">
          <h5>Cửa hàng</h5>
          <ul class="list-unstyled text-small">
            <li><a class="link-secondary" href="#">Hệ thống cửa hàng</a></li>
            <li><a class="link-secondary" href="#">Hệ thống bảo hành</a></li>
            <li><a class="link-secondary" href="#">Bán hàng doanh nghiệp</a></li>
            <li><a class="link-secondary" href="#">Giới thiệu máy đổi trả</a></li>
            <li><a class="link-secondary" href="#">Chính sách đổi trả</a></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- end footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>