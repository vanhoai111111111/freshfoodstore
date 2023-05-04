<!DOCTYPE html>
                <html>
<?php
                    include_once "include/css.php"
                    ?>
    <?php
    $customer_id = Session::get('customer_id');
    if(isset($_GET['partnerCode'])){
        $code_order = rand(0,9999);
        $partnerCode = $_GET['partnerCode'];
        $orderId = $_GET['orderId'];
        $requestId = $_GET['amount'];
        $amount = $_GET['orderInfo'];
        $orderInfo = $_GET['orderType'];
        $transId = $_GET['transId'];
        $payType = $_GET['payType'];
        $insert_momo = "INSERT INTO tbl_momo(partner_code,order_id,amount,order_info,order_type,trans_id,pay_type,code_cart) VALUE('".$partnerCode."','".$orderId."','".$requestId."','".$amount."','".$orderInfo."','".$transId."','".$payType."','".$code_order."')";
        
        $cart_query = mysqli_query($conn,$insert_momo);
        $sId = session_id();
        $query = "SELECT * FROM tbl_cart WHERE sId= '$sId'";
        $get_product = mysqli_query($conn,$query);
           
        if($cart_query){
            while($result = $get_product->fetch_assoc()){
                $productid = $result['productId'];
                $productName = $result['productName'];
                $quantity = $result['quantity'];
                $price = $result['price'];
                $image = $result['image'];
                $customer_id = $customer_id;
                $query_order = "INSERT INTO tbl_order(productId,productName,quantity,price,image,customer_id,trans_orderid) values('$productid','$productName','$quantity','$price','$image','$customer_id','$orderId')";
                $insert_order = mysqli_query($conn,$query_order);
                
            }
            echo '
                <head>
                    <meta charset="utf-8" />
                    <title>Fresh Food store | Thực phẩm sạch</title>
                    <link rel="shortcut icon" href="images/logo/favicon.ico" />
                    
                    <link href="Content/style-bill-success.css" rel="stylesheet" />
                </head>

                <body>
                <div class="bill-success">
                <img src="images/logo/tich-xanh.png" />
                <h1>Quý đã thanh toán momo thành công!</h1>
                <span>Tiếp tụp mua hàng?</span>
                <div class="btn"><a href="/freshfoodstore">OK</a></div>
            </div>
                        
            </body>

            ';
            
                
                if ($result_delcart = $conn->query("SELECT * FROM tbl_cart WHERE sId= '$sId'")) {
                    
                    if($result_delcart->num_rows > 0)
                    {
                        $delCart = $ct->del_all_data_cart();
                    }                                       
                     $result_delcart->close();
                }
        }
    }
    
    ?>

</html>