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
    $login_check = Session::get('customer_login');
    if($login_check==false){
        echo "<script>window.location ='login.php'</script>";
    }
    ?>
    <?php
    $id = Session::get('customer_id');  
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save'])) {
                                        
        $UpdateCustomers = $cs ->update_customers($_POST,$id);
          }
    ?>
    <main>
        <div id="content" class="list-product container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="bill.html">Hóa đơn</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Thông tin</li>
                </ol>
            </nav>
            <div class="the-title">
                <h2>
                    Thông tin
                </h2>
                <img class="img-fluid" src="images/hinh-anh-trang-chu/logo-leaf.png" />
            </div>
            <?php
            $id = Session::get('customer_id');           
             $get_customer = $cs->show_customer($id);
              if($get_customer){
              while($result = $get_customer->fetch_assoc()){        
              ?>
            <form action="" method="POST">
                <div style="margin: -45px 70px 0 70px;">
                    <table class="table table-borderless">
                        <tr>
                            <th scope="row">Họ và Tên: </th>
                            <td><?php echo $result['name']?></td>
                        </tr>
                        <tr>
                            <th scope="row">Số điện thoại: </th>
                            <td><?php echo $result['phone']?></td>
                        </tr>
                        <tr>
                            <th scope="row">Địa chỉ nhận hàng: </th>
                            <td><?php echo $result['address']?></td>
                        </tr>
                        <tr>
                            <th scope="row">Email: </th>
                            <td><?php echo $result['email']?></td>
                        </tr>
                    </table>

                    <div class="personal-import">
                        <form class="form-group" action="#" method="post">
                            <div class="row">
                                <div class="col-4">
                                    <label class="control-label">
                                        Thay đổi họ tên:
                                    </label>
                                </div>
                                <div class="col-8">
                                    <input class="form-control" name="name" type="text" value="<?php echo $result['name']?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label class="control-label">
                                        Thay đổi số điện thoại:
                                    </label>
                                </div>
                                <div class="col-8">
                                    <input class="form-control" name="phone" type="tel" value="<?php echo $result['phone']?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label class="control-label">
                                        Thay đổi địa chỉ nhận hàng:
                                    </label>
                                </div>
                                <div class="col-8">
                                    <textarea class="form-control" name="address" type="text"><?php echo $result['address']?></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <i class="pull-right">
                                        Để nhận hàng thuận tiện hơn, bạn vui lòng cho FreshFood biết loại địa chỉ.
                                    </i>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label class="control-label">
                                        Loại địa chỉ:
                                    </label>
                                </div>
                                <div class="col-4 form-check">
                                    <input class="form-check-input check-box" type="radio" name="addressType"
                                        id="gridRadios1" value="option1" checked>
                                    <label class="form-check-label" for="gridRadios1">
                                        Nhà riêng / Chung cư
                                    </label>
                                </div>
                                <div class="col-4 form-check">
                                    <input class="form-check-input check-box" type="radio" name="addressType"
                                        id="gridRadios2" value="option2">
                                    <label class="form-check-label" for="gridRadios2">
                                        Cơ quan / Công ty
                                    </label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-8">
                                    <div class="pull-right"><a href="bill.html" class="btn btn-outline-danger">Hủy
                                            bỏ</a>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <button type="submit" name="save" class="btn btn-success">Cập nhật</button>
                                </div>
                                <?php
                                if(isset($UpdateCustomers)){
                                    echo $UpdateCustomers;
                                }
                                ?>
                            </div>
                        </form>
                    </div>
                </div>
            </form>
            <?php
                }
            }
            ?>

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