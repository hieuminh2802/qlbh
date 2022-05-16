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
<!-- Cart -->
<?php
    $count=0;
    if(isset($_SESSION['cart']))
    {
        $count=count($_SESSION['cart']);
    }
?>
<?php
    // if(isset($_POST['addtocart'])){
    //     if(isset($_SESSION['cart'])){

    //         $session_array_id = array_column($_SESSION['cart'],"id");
            
    //         if(!in_array($_GET['id'],$session_array_id))
    //         {   
    //             $count = count($_SESSION['cart']);
                // $session_array = array(
                //     'id' => $_GET['id'],
                //     "info"=> $_POST['info'],
                //     "itemname" =>$_POST['itemname'],
                //     "price" =>$_POST['price'],
                //     "quantity" =>$_POST['quantity']
    //             );
    //             $count=count($_SESSION['cart']); 
    //             $_SESSION['cart'][$count]=$session_array;
    //             echo"<script>
    //                 alert('Đã thêm vào giỏ hàng');
    //                 window.location.href='Home.php';
    //             </script>";
    //         }else{
    //             echo"<script>
    //                 alert('Sản phẩm đã được thêm vào giỏ hàng');
    //                 window.location.href='Home.php';
    //             </script>";
    //         }
    //     }else{
            
    //         $session_array = array(
    //             'id' => $_GET['id'],
    //             "info"=> $_POST['info'],
    //             "itemname" => $_POST['itemname'],
    //             "price" => $_POST['price'],
    //             "quantity" => $_POST['quantity'] 
    //         );
    //         $_SESSION['cart'][0]= $session_array;
    //             echo"<script>
    //                 alert('Sản phẩm đã được thêm vào giỏ hàng');
    //                 window.location.href='Home.php';
    //             </script>";
    //     }
    // }
?>

<?php 
function load_cart(){
                        $total =0;
                        echo"
                <table class='table table-striped table-hover text-center test'>
                        <tr>
                            <th>Mã sản phẩm</th>
                            <th>Tên mặt hàng</th>
                            <th>Thông tin</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng giá</th>
                            <th>Hành động</th>
                        </tr>
                        ";

                    if(isset($_SESSION['cart'])){

                                foreach($_SESSION['cart'] as $key => $value){
                                    $total = $total + $value['price'];
                                    echo"
                                    <tr>
                                        <td>".$value['id']."</td>
                                        <td>".$value['itemname']."</td>
                                        <td>".$value['info']."</td>
                                        <td>".$value['price']."<input class='iprice' type='hidden' value='$value[price]'></td>
                                        <td><input class='text-center iquantity' onchange='subTotal()' type='number' value='$value[quantity]' min='1' max='5' style='max-width: 3rem;'></td>
                                        <td class='itotal'></td>
                                        <td>
                                            <form method='POST'>
                                                <button name='remove' class='btn btn-danger btn-block'>xoá</button>
                                                <input type='hidden' name='id' value='$value[id]'>
                                            </form>
                                        </td>
                                    ";
                                }
                                echo"
                                <tr>
                                    <td colspan='4' ></td>
                                    <td></b>Tổng giá</b></td>
                                    <td class='gtotal'></td>
                                    <td></td>
                                </tr>
                                ";
                            }
}
?>

<?php
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(isset($_POST['addtocart']))
        {
            if(isset($_SESSION['cart']))
            {
            
                $myitems = array_column($_SESSION['cart'],'id');
                if(in_array($_GET['id'],$myitems))
                { 
                    echo"<script>
                        alert('Sản phẩm đã được thêm vào vào giỏ hàng !!!');
                    </script>"; 
                }
                else{
                $count = count($_SESSION['cart']);
                $_SESSION['cart'][$count]= array('id' => $_GET['id'],
                    "info"=> $_POST['info'],
                    "itemname" =>$_POST['itemname'],
                    "price" =>$_POST['price'],
                    "quantity" =>$_POST['quantity']);
                    print_r($_SESSION['cart']);
                    echo"<script>
                        alert('Đã thêm sản phẩm');
                    </script>";
                }
            }
            else
            {
                $_SESSION['cart'][0]= array('id' => $_GET['id'],
                    "info"=> $_POST['info'],
                    "itemname" =>$_POST['itemname'],
                    "price" =>$_POST['price'],
                    "quantity" =>$_POST['quantity']);
                    echo"<script>
                        alert('Đã thêm sản phẩm');
                    </script>";
            }
        }
        if(isset($_POST['remove'])){
            foreach($_SESSION['cart'] as $key=>$value){
                if($value['id']==$_POST['id']){
                    unset($_SESSION['cart'][$key]);
                    $_SESSION['cart']=array_values($_SESSION['cart']);
                    echo"<script>
                        alert('Đã xoá sản phẩm');
                        window.location.href='cart.php';
                    </script>";
                }
            }
        }
    }
?>
<script>
const iquantity = document.getElementsByClassName('iquantity');
const iprice = document.getElementsByClassName('iprice');
const itotal = document.getElementsByClassName('itotal');



const calcFinalCost = () => {
    const wrapper = document.querySelector('.test')
    const quantities = document.querySelectorAll('.itotal')
    const gtotal = document.querySelector('.gtotal');

    let cost = 0
    quantities.forEach(element => {
        const itCost = parseInt(element.innerText)
        cost += itCost
    });
    gtotal.innerText = cost.toLocaleString('vi', {
        style: 'currency',
        currency: 'VND'
    });
}



function subTotal() {
    for (i = 0; i < iprice.length; i++) {
        itotal[i].innerText = ((iprice[i].value) * (iquantity[i].value));
    }

    calcFinalCost()

}

//! cai nay khi load trong xong thi goi mot lan de hien thi subtotal
window.addEventListener('load', () => {
    subTotal();
    calcFinalCost();

})
</script>