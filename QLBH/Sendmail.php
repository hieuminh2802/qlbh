<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- FA -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!-- Bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>
    <?php require_once("Controller/ManagerProductController.php") ?>
    <!-- start header -->
    <?php include "includes/headerAdmin.php" ?>
    <!-- endheader -->
    <div class="container">
        <h3 class="text-center">Gửi mail cho người dùng</h3>
        <?php echo $msg2; ?>
        <form class="" method="POST">
            <div class="mb-3">
                <label class="form-label">Tiêu đề</label>
                <input type="text" class="form-control" id="subject" name="subject"
                    placeholder="Nhập tiêu đề thư .....">
            </div>

            <div class="mb-3">
                <label class="form-label">Nội dung</label>
                <textarea name="info" id="info" class="form-control" aria-label="With textarea"
                    placeholder="Nội dung thư....."></textarea>
            </div>
            <div class="">
                <button class="btn btn-success" type="submit" name="sendmail">Gửi thư </button>
            </div>
        </form>
    </div>
    <!-- footer -->
    <?php include "includes/footer.php" ?>
    <!-- end footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>