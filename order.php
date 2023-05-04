<!DOCTYPE html>
<html>

<head>
    <?php
    include_once 'include/css.php'
    ?>
</head>

<body style="background-color: #fff">

    <?php
    include_once 'include/header.php'
    ?>
    <?php
    if(isset($_GET['orderid']) && $_GET['orderid']=='order'){
        $customer_id = Session::get('customer_id');
        $insertOrder = $ct->insertOrder($customer_id);
        $delCart = $ct->del_all_data_cart();
        echo "<script>window.location ='success.php'</script>";
    }
    ?>
    <?php   
        $login_check = Session::get('customer_login');
        if($login_check==false){
            echo "<script>window.location ='login.php'</script>";
        }
        ?>
    <main>
        <form action="" method="POST">
            <div id="content" class="list-product container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Hóa đơn</li>
                    </ol>
                </nav>
                <div class="the-title">
                    <h2>
                        Hóa đơn
                    </h2>
                    <img class="img-fluid" src="images/hinh-anh-trang-chu/logo-leaf.png" />
                </div>

                <div style="margin: -45px 70px 0 70px;">
                    <?php
            $id = Session::get('customer_id');           
             $get_customer = $cs->show_customer($id);
              if($get_customer){
              while($result = $get_customer->fetch_assoc()){        
              ?>
                    <table class="table table-borderless">
                        <tr>
                            <th scope="row">Họ và Tên: </th>
                            <td><?php echo $result['name']?></td>
                            <td> <a class="btn btn-outline-info" href="personal.php" style="text-decoration:none;">Thay
                                    đổi</a></td>
                        </tr>
                        <tr>
                            <th scope="row">Số điện thoại: </th>
                            <td colspan="2"><?php echo $result['phone']?></td>
                        </tr>
                        <tr>
                            <th scope="row">Địa chỉ nhận hàng: </th>
                            <td colspan="2"><?php echo $result['address']?></td>
                        </tr>
                        
                    </table>
                    <?php
                }
            }
            ?>
                    <?php
                                    $check_cart = $ct ->check_cart();
                                    if($check_cart){
                                        
                                ?>
                    <table class="table table-borderless table-striped text-center">
                        <thead>
                            <tr>
                                <th scope="col">Tên hàng</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Thành tiền</th>
                            </tr>

                        </thead>
                        <?php 
                    $get_product_cart = $ct->get_product_cart();
                    
                    if($get_product_cart){
                        $subtotal = 0;
                        $qty = 0;
                        while($result = $get_product_cart->fetch_assoc()){
                ?>
                        <tbody>
                            <tr>
                                <td width="400px" class="align-middle">
                                    <img class="img-fluid" alt="" src="admin/uploads/<?php echo $result['image']?>"
                                        style="width:60px;height:60px;float: left;">

                                    <span
                                        style="font-size: 16px;max-height: 40px;max-width: 250px;text-overflow: ellipsis;line-height: 20px;display: -webkit-box;-webkit-line-clamp: 2;    overflow: hidden; padding-left: 10px;">
                                        <?php echo $result['productName']?>
                                    </span>

                                </td>
                                <td class="align-middle">
                                    <?php echo $result['price']?>
                                </td>
                                <td class="align-middle">
                                    <?php echo $result['quantity']?>
                                </td>
                                <td class="align-middle">
                                    <?php
                                $total = $result['price'] * $result['quantity'];
                                echo $total;
                                ?>
                                </td>
                            </tr>
                        </tbody>
                        <?php
                
                    $subtotal+=$total;
                    $qty = $qty + $result['quantity'];
                    $vat = $subtotal * 0.1;
                    $gtotal = $subtotal + $vat;
                        }
                    }
            ?>
                    </table>

                    <hr />
                </div>
                <div class="row pb-4">
                    <div class="col" style="padding: 7px 20px 0 0">
                        <b style="font-weight: 700; font-size: 25px; color: #6DD853" class="pull-right">Tổng số tiền:
                            <?php echo $gtotal;?>
                            <span class="pull-right" style="font-size: 13px;">(đã bao gồm VAT)</span></b>

                    </div>
                    <div class="col" style="padding: 0 90px 0 0">
                        <!-- <span class="pull-right"
                            style="font-weight: 700; font-size: 25px; color: #6DD853"><?php echo $gtotal;?></span>
                        <span class="pull-right" style="font-size: 13px;">(đã bao gồm VAT)</span> -->
                        <div class="pull-right" style="margin-top: 10px">
                            <a href="?orderid=order" class="btn btn-warning"
                                style="min-width: 150px; font-size: 17px; font-weight: 500; color: #655f5f;"> Thanh toán
                                tiền mặt khi nhận hàng (COD)</a>
                        </div>

                    </div>

                    
        </form>

    </main>
    <div id="content" class="list-product container">
        <div class="row pd-4 pb-4">
            <div>
                <b>Phương thức thanh toán khác:</b>
            </div>
        </div>
        <div class="row pd-4">

            <div class="col-4">
                <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded"
                    action="congthanhtoanmomo.php">
                    <div class="form-check cod">
                        <img width="19" src="images/logo/logo-momo.jpg" />
                        <input type="hidden" name="total_congthanhtoan" value="<?php echo $gtotal ?>"/>
                        <input type="submit" name="captureWallet" id="redirect" value="Thanh toán bằng QR MoMo"
                            class="btn btn-momo btn-lg" />
                    </div>
                </form>
            </div>
            <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded"
                action="congthanhtoanmomo.php">
                <div class="form-check cod">
                    <img width="19" src="images/logo/logo-momo.jpg" />
                    <input type="hidden" name="total_congthanhtoan" value="<?php echo $gtotal ?>"/>
                    <input type="submit" name="payWithATM" id="redirect" value="Thanh toán bằng ATM MoMo"
                        class="btn btn-momo btn-lg" />
                </div>
            </form>
            <div class="col-4">
                <form class="" method="POST" target="_blank" enctype="application/x-www-form-urlencoded"
                    action="congthanhtoanmomo.php">
                    <div class="form-check cod">
                    <img width="43" src="images/logo/zalopay-logo.PNG" />
                    <input type="hidden" name="total_congthanhtoan" value="<?php echo $gtotal ?>"/>
                        <input type="submit" name="momo" id="redirect" value="Thanh toán bằng ZaloPay"
                            class="btn btn-zalo btn-lg" />
                    </div>
                </form>
            </div>
            <?php
             }
        ?>
        </div>
        
    </div>
    
    <?php
    include 'include/footer.php'
    ?>
    <a href="javascript:void(0);" class="back-to-top" style="display: block;"><span>Top</span></a>
    <div id="script">
        <script src="Scripts/popper.js"></script>
        <script src="Scripts/jquery-3.0.0.js"></script>
        <script src="Scripts/bootstrap.js"></script>
        <script src="Scripts/sweetalert2.all.min.js"></script>
        <script src="Scripts/script.js"></script>
    </div>
</body>

</html>