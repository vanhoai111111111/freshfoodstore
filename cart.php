<!DOCTYPE html>
<html>
<head>
<?php
    include_once 'include/css.php'
    ?>
</head>
<body>
    <?php
    include_once 'include/header.php'
    ?>
<?php
if(isset($_GET['cartid']))
{
    $cartid=$_GET['cartid'];
    $delcart = $ct ->del_product_cart($cartid);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $idcart = $_POST['cartId'];
    $quantity = $_POST['quantity'];
    $update_quantity_cart = $ct ->update_quantity_cart($quantity,$idcart);
}
?>
<?php
    if(!isset($_GET['id'])){
        echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
    }
?>
    <main>
        <form action="cart.php" method="POST">
        <div class="container cart-body">
            <?php
            if(isset($update_quantity_cart)){
                echo $update_quantity_cart;
            }
            ?>
            <?php
            if(isset($delcart)){
                echo $delcart;
            }
            ?>
            <div class="the-title">
                <h2>
                    Giỏ hàng
                </h2>
                <img class="img-fluid" src="images/hinh-anh-trang-chu/logo-leaf.png" />
                <span>(<?php
                                    $check_cart = $ct ->check_cart();
                                    if($check_cart){
                                        $qty = Session::get("qty");
                                        echo $qty;
                                    }else{
                                        echo '0';
                                    }
                                ?>  sản phẩm)</span>
            </div>
            <div class="row">
                <div class="col-9 cart">
                <?php 
                    $get_product_cart = $ct->get_product_cart();
                    
                    if($get_product_cart){
                        $subtotal = 0;
                        $qty = 0;
                        while($result = $get_product_cart->fetch_assoc()){
                ?>
                    <div class="row cart-box">
                        <div class="col cart-img">
                            <a href="detail.html">
                                <img class="img-fluid" src="admin/uploads/<?php echo $result['image']?>" />
                            </a>
                            <a href="?cartid=<?php echo $result['cartId'] ?>" title="Xóa sản phẩm này khỏi giỏ hàng" class="btn btn-outline-info" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">
                                X
                            </a>
                        </div>

                        <div class="col cart-title">
                            <a href="detail.html" class="item-title">
                                <?php echo $result['productName']?>
                            </a>
                        </div>
                        <div class="col cart-price">
                            <strong class="price">
                            <?php echo $result['price']?>
                            </strong>
                        </div>
                        <div class="col cart-number">
                            <div class="cart-buttons">
                                
                                <input type="hidden" name="cartId" value="<?php echo $result['cartId']?>" />
                                <input type="number" name="quantity" value="<?php echo $result['quantity']?>" min="1" max="100" />
                                <input type="submit" class="btn btn-secondary btn-sm" name="submit" value="Update" />
                            </div>
                        </div>
                        <div class="col cart-number">
                        
                            <div class="cart-buttons">
                                <?php
                                $total = $result['price'] * $result['quantity'];
                                echo $total;
                                ?>
                            </div>
                           
                            
                        </div>
                    </div>
                    <?php
                    $subtotal+=$total;
                    $qty = $qty + $result['quantity'];
                        }
                    }
            ?>
                </div>
                <?php
                                    $check_cart = $ct ->check_cart();
                                    if($check_cart){
                                        
                                ?>
                <div class="col-3">
                    <div class="panel-cart">
                        <div class="row mt-3">
                            <div class="col-5">
                                <strong>Tạm tính</strong>
                            </div>
                            
                            <div class="col-7">
                                <p class="pull-right"><span><?php
                                
                                echo $subtotal;
                                Session::set('sum',$subtotal);
                                Session::set('qty',$qty);
                                ?></span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5">
                                <strong>VAT(10%)</strong>
                            </div>
                            <div class="col-7">
                                <span class="pull-right"><span><?php
                                $vat = $subtotal * 0.1;
                                echo $vat;
                                ?></span></span>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-5">
                                <strong>Thành tiền</strong>
                            </div>
                            <div class="col-7">
                                <div class="pull-right">
                                    <span style="font-weight: 600;color: red;font-size: 20px;"><?php
                                    $gtotal = $subtotal + $vat;
                                    echo $gtotal;
                                    ?></span>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="pull-right mb-3"><i>(Đã bao gồm VAT nếu có)</i></div>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-danger btn-block" style="padding: 7px 0px;" href="order.php"><span>Tiến hành đặt hàng</span></a>
                </div>
                
            </div>
            <?php
                }else{
                    echo'
                    <div class="alert alert-warning" role="alert">
                    Giỏ hàng của bạn đang trống!
                  </div>';

                }
                ?>
        </div>
        </form>
    </main>

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