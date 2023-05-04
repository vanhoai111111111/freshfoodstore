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
    <main>
        <?php
        
        $login_check = Session::get('customer_login');
        if($login_check){
            echo "<script>window.location ='order.php'</script>";
        }

        ?>
    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
                                        
        $insertCustomers = $cs ->insert_customers($_POST);
          }
       ?>
       <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
                                        
        $loginCustomers = $cs ->login_customers($_POST);
          }
       ?>
        <div class="last" style="position: relative">
            <div class="background-leaf"></div>
            <div class="container">
                <div class="row">
                    <div class="col-8">
                        <div id="login-register">
                            <div class="row">
                                <div class="col-4">
                                    <div class="title-login-register text-center">
                                        <ul>
                                            <li onclick="changeContent(this, 'p1')" class="li active">
                                                <span>Đăng Nhập</span>
                                                <i>Đã là thành viên FreshFood</i>
                                            </li>
                                            <li onclick="changeContent(this, 'p2')" class="li">
                                                <span>Tạo Tài Khoản</span>
                                                <i>Dành cho khách hàng mới</i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-8 content-login-register">
                                    <form id="p1" class="form-group input-login-register" action="" method="post">
                                        <label class="control-label">
                                            Email
                                        </label>
                                        <input name="email" class="form-control " name="name" type="text" placeholder="Nhập email">
                                        <label class="control-label">
                                            Mật khẩu
                                        </label>
                                        <input class="form-control" type="password" name="password" type="text" placeholder="Nhập mật khẩu">
                                        <button name="login" type="submit" class="btn btn-info btn-block">Đăng nhập</button>
                                    </form> 

                                    <form id="p2" class="form-group input-login-register hide" action="" method="post">
                                        <label class="control-label">
                                            Họ và tên
                                        </label>
                                        <input class="form-control" name="name" type="text" placeholder="Nhập họ và tên">                           

                                        <label class="control-label">
                                            Mật khẩu
                                        </label>
                                        <input class="form-control" type="password" name="password" type="text" placeholder="Nhập mật khẩu">
                                       

                                        <label class="control-label">
                                            Email
                                        </label>
                                        <input name="email" class="form-control" type="text" placeholder="Nhập email">
                                        

                                        <label class="control-label">
                                            Số điện thoại
                                        </label>
                                        <input name="phone" class="form-control" type="tel" placeholder="Nhập số điện thoại">
                                       

                                        <label class="control-label">
                                            Địa chỉ nhận hàng
                                        </label>
                                        <input name="address" class="form-control" type="text" placeholder="Nhập địa chỉ nhận hàng">
        
                                        <small style="margin-top: 15px; visibility: visible">
                                            Khi bạn nhấn Đăng ký, bạn đã đồng ý thực hiện mọi giao dịch mua bán theo
                                            <a href="#" style="color:#0082ff;">điều kiện sử dụng và chính sách của FreshFood.</a>
                                        </small>

                                        <button type="submit" name="submit" value="submit" class="btn btn-warning btn-block">Đăng ký</button>
                                    </form>
                                </div>                              
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div id="panel-cart">
                            <?php
                            if(isset($insertCustomers)){
                                echo $insertCustomers;
                            }
                            ?>
                            <?php
                            if(isset($loginCustomers)){
                                echo $loginCustomers;
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
  
                </div>
            </div>
        </div>
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