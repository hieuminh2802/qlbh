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
    </style>
    <?php require_once("Controller/ManagerProductController.php") ?>
    <!-- start header -->
    <div class="p-3 mb-3 bg-light text-white border-bottom">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

                <a href="Admin.php" class="d-flex align-items-center mb-2 mb-lg-0">
                    <img src="Assets/img/logo5.png" width="60" height="55" alt="">
                </a>

                <ul class="nav justify-content-center col-12 col-lg-auto me-lg-auto mb-2 mb-md-0">
                    <li><a href="Account.php" class="nav-link px-2 link-dark fw-bold">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-person-badge" viewBox="1 0 18 18">
                                <path
                                    d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                <path
                                    d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0h-7zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492V2.5z" />
                            </svg>Qu???n l?? t??i kho???n</a></li>
                    <li><a href="Product.php" class="nav-link px-2 link-dark fw-bold">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-phone" viewBox="1 0 18 18">
                                <path
                                    d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z" />
                                <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
                            </svg>Qu???n l?? s???n ph???m</a></li>
                    <li><a href="#" class="nav-link px-2 link-dark fw-bold">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-cart3" viewBox="1 0 18 18">
                                <path
                                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg>Qu???n l?? ????n h??ng</a></li>
                </ul>
                <div class="dropdown text-end">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="Assets/img/avt.png" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#">C??i ?????t</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="index.php">????ng xu???t</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- endheader -->
    <!-- star main -->
    <div class="container">
        <div class="col-md-12">
            <h2 class="title text-center fw-bold">Qu???n l?? s???n ph???m</h2>
            <div class=" search">
                <form action="" method="GET" class="form">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label fw-bold">??i???n t??? kho?? </label>
                        <div class="input-group mb-3">
                            <input type="text" id="search" name="search" class="form-control"
                                placeholder="Nh???p t??? kho?? t??m ki???m ....">
                            <button class="btn btn-outline-secondary btn-warning" name="add">T??m ki???m <i
                                    class="bi bi-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
            <?php echo $msg; ?>
            <td>
                <a href="AddProduct.php">
                    <button class='btn btn-success btn-block'>Th??m s???n ph???m <i class="bi bi-plus"></i></button>
                </a>
            </td>
            <table class="table table-striped table-hover text-center">
                <tr>
                    <th>STT</th>
                    <th>T??n s???n ph???m</th>
                    <th>M?? t???</th>
                    <th>Gi??</th>
                    <th>H??nh ???nh</th>
                    <th>H??nh ?????ng</th>
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
                    <td><img src="Assets/img/<?=$data['image']?>" style='height: 200px;'></td>
                    <td>
                        <a href="UpdateProduct.php?id=<?php echo $id;?>">
                            <button class='btn btn-success btn-block'><i class="bi bi-pencil-square"></i></button>
                        </a>
                        <a href="Product.php?id_delete=<?php echo $id;?>">
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
    </div>
    <!-- end main -->
    <!-- footer -->
    <div class="container py-5">
        <div class="row ">
            <div class="col-12 col-md">
                <a href="index.php" class="d-flex align-items-center mb-2 mb-lg-0">
                    <img src="Assets/img/logo5.png" width="60" height="55" alt="">
                </a>
            </div>
            <div class="col-6 col-md">
                <h5>Ch??nh s??ch</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="link-secondary" href="#">Gi???i thi???u v??? c??ng ty</a></li>
                    <li><a class="link-secondary" href="#">C??u h???i th?????ng g???p mua h??ng</a></li>
                    <li><a class="link-secondary" href="#">Ch??nh s??ch b???o m???t</a></li>
                    <li><a class="link-secondary" href="#">Quy ch??? ho???t ?????ng</a></li>
                    <li><a class="link-secondary" href="#">Ki???m tra h??a ????n ??i???n t???</a></li>
                    <li><a class="link-secondary" href="#">Tra c???u th??ng tin b???o h??nh</a></li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>Tuy???n d???ng</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="link-secondary" href="#">Tin tuy???n d???ng</a></li>
                    <li><a class="link-secondary" href="#">Tin khuy???n m??i</a></li>
                    <li><a class="link-secondary" href="#">H?????ng d???n mua online</a></li>
                    <li><a class="link-secondary" href="#">H?????ng d???n mua tr??? g??p</a></li>
                    <li><a class="link-secondary" href="#">Ch??nh s??ch tr??? g??p</a></li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>C???a h??ng</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="link-secondary" href="#">H??? th???ng c???a h??ng</a></li>
                    <li><a class="link-secondary" href="#">H??? th???ng b???o h??nh</a></li>
                    <li><a class="link-secondary" href="#">B??n h??ng doanh nghi???p</a></li>
                    <li><a class="link-secondary" href="#">Gi???i thi???u m??y ?????i tr???</a></li>
                    <li><a class="link-secondary" href="#">Ch??nh s??ch ?????i tr???</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- end footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>