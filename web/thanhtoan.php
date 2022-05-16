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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>

    <div class="container-fluid">
        <div class="col-md-12 bg">
            <div class="row">
                <div class="col-md-6">
                </div>
                <div class="col-md-6">
                    <div id="paypal-button-container">
                        <h2 class="text-center">Chi tiết giỏ hàng</h2>
                        <?php

                            $total= 0;
                            $output = "";
                            $output .= "

                            <table class='table table-success table-striped table-hover'>
                                <tr>
                                    <th>Mã sản phẩm</th>
                                    <th>Tên mặt hàng</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng giá</th>
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
                                        <td>".($value['price'] * $value['quantiny'])."</td>
                                    ";
                                    $total = $total + $value['quantiny'] * $value['price'];

                                }
                                $output .="
                                <tr>
                                    <td colspan='2' ></td>
                                    <td></b>Tổng giá</b></td>
                                    <td>".number_format($total)."</td>
                                    <td>
                                        <a href='cart.php'>
                                        <button class='btn btn-info'>Thay đổi giỏ hàng</button>
                                        </a>
                                    </td>
                                </tr>
                                ";
                            }
                            echo $output; 
                        ?>
                        <?php
                            $thanhtien = round($total/23000);
                        ?>
                        <!-- Replace "test" with your own sandbox Business account app client ID -->
                        <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>
                        <!-- Set up a container element for the button -->

                        <script>
                        paypal.Buttons({
                            // Sets up the transaction when a payment button is clicked
                            createOrder: (data, actions) => {
                                var thanhtien = <?= $thanhtien ?>
                                return actions.order.create({
                                    purchase_units: [{
                                        amount: {
                                            value: thanhtien // Can also reference a variable or function
                                        }
                                    }]
                                });
                            },
                            // Finalize the transaction after payer approval
                            onApprove: (data, actions) => {
                                return actions.order.capture().then(function(orderData) {
                                    // Successful capture! For dev/demo purposes:
                                    console.log('Capture result', orderData, JSON.stringify(
                                        orderData, null, 2));
                                    const transaction = orderData.purchase_units[0].payments
                                        .captures[0];
                                    alert(
                                        `Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`
                                    );
                                    // When ready to go live, remove the alert and show a success message within this page. For example:
                                    // const element = document.getElementById('paypal-button-container');
                                    // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                                    // Or go to another URL:  actions.redirect('thank_you.html');
                                });
                            }
                        }).render('#paypal-button-container');
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>