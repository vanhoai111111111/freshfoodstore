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
if(!isset($_GET['proid']) || $_GET['proid']== null){
    echo "<script>window.location ='404.php'</script>";
}
else{
    $id=$_GET['proid'];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $quantity = $_POST['quantity'];
    $mua = $ct ->add_mua($quantity,$id);
}
   
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addProduct'])) {
    $quantity = $_POST['quantity'];
    $AddtoCart = $ct ->add_to_card($quantity,$id);
}
   
?>

    <main>
    <form action="" method="POST">
    <?php
                            $get_product_details = $product->get_details($id);
                            if($get_product_details){
                                while($result_details = $get_product_details->fetch_assoc()){
                                    
                        ?>
        <div class="detail container">
            <div class="row entry-summary">
                <div class="col-5">
                    <div class="img-detail">
                        <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails img-box ">
                            <a href="admin/uploads/<?php echo $result_details['image']?>">
                                <img width="350" height="350" src="admin/uploads/<?php echo $result_details['image']?>" />
                            </a>
                        </div>
                        
                    </div>
                </div>
                <div class="col-7">
                    <div class="summary">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="FreshFoodPHP/">Trang chủ</a></li>
                                <li class="breadcrumb-item"><a href="list-product.php"><?php echo $result_details['brandName']?></a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $result_details['productName']?></li>
                            </ol>
                        </nav>
                        <div class="the-title">
                            <h2>
                                <?php echo $result_details['productName']?>
                            </h2>
                        </div>
                        <div class="price-box">
                            <label class="tittle">Giá:</label>
                            <strong class="price-order"><?php echo $result_details['price']." "."VNĐ"?></strong>
                        </div>
                        <div class="number-box">
                            <label class="mini-tittle">Số lượng: </label>
                            <input type="number" name="quantity" value="1" min="1" max="100" />
                            <span class="view-box">
                                113 sản phẩm có sẵn
                            </span>
                            <span class="view-box">
                                2 sản phẩm đã bán
                            </span>
                        </div>
                        <div class="button">
                            <input type="submit" name="addProduct" class="btn btn-outline-success btn-text" value="Thêm Vào Giỏ Hàng"
                               
                                />
                            <!-- <a href="bill.html" name="" class="btn btn-success btn-text">Mua Ngay</a> -->
                            <input type="submit" class="btn btn-success btn-text" name="submit" value="Mua Ngay"/>
                        </div>                     
                    </div>
                </div>
            </div>

            <div class="description-box">
                <div class="tab-description-review">
                    <ul>
                        <li onclick="changeContent(this, 'p1')" class="li active">
                            <span>Sản Phẩm</span>
                        </li>
                        <li onclick="changeContent(this, 'p2')" class="li">
                            <span>Đánh Giá</span>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"></div>
                <div class="description">
                    <div id="p1" class="input-login-register">
                        <div class="the-title">
                            <h4>
                            <?php echo $result_details['productName']?>
                            </h4>
                            <img src="images/hinh-anh-trang-chu/logo-leaf.png" />
                        </div>
                        <p>
                        <?php echo $result_details['description']?>
                        </p>
                    </div>
                    <div id="p2" class="input-login-register hide">
                        <div class="the-title">
                            <h4>
                                Bình Luận
                            </h4>
                        </div>
                        <div class="cmt-box">
                            <ul class="cmt-list">
                                <li class="cmt">
                                    <span class="pull-left">P</span>
                                    <div class="cmt-body">
                                        <span class="text-muted pull-right">
                                            <small class="text-muted">27/3/2020</small>
                                        </span>
                                        <strong>Quốc Hưng</strong>
                                        <p>
                                            Sản phẩm chất lượng tốt, đóng gói đẹp chắc chắn
                                        </p>
                                    </div>
                                    <div class="reply-body" style="display: block">
                                        <div class="reply">
                                            <span>Trả lời</span>
                                            <small class="text-muted">
                                                - 28/3/2022
                                            </small>
                                        </div>
                                        <img src="images/logo/logo-f.jpg" />
                                        <strong class="text-success">FreshFood</strong>
                                        <span class="admin">Quản trị viên</span>
                                        <p>
                                            Cảm ơn quá khách đã quan tầm về sản phẩm!
                                        </p>
                                    </div>
                                </li>

                                <li class="cmt">
                                    <span class="pull-left">P</span>
                                    <div class="cmt-body">
                                        <span class="text-muted pull-right">
                                            <small class="text-muted">28/3/2020</small>
                                        </span>
                                        <strong>Phụng Phạm</strong>
                                        <p>
                                            Nói chung là ngon, đóng gói không bị dập nên quay lại mua tiếp
                                        </p>
                                    </div>
                                    <div class="reply-body" style="display:block">
                                        <div class="reply">
                                            <span>Trả lời</span>
                                            <small class="text-muted">
                                                - 28/3/2020
                                            </small>
                                        </div>
                                        <img src="images/logo/logo-f.jpg" />
                                        <strong class="text-success">FreshFood</strong>
                                        <span class="admin">Quản trị viên</span>
                                        <p>
                                            Cạn lời!
                                        </p>
                                    </div>
                                </li>
                            </ul>
                            <form action="/" method="post" class="form-group">
                                <textarea class="form-control" placeholder="Để lại đánh giá của bạn về sản phẩm này..." rows="3"></textarea>
                                <button type="button" title="Gửi bình luận" class="btn btn-outline-info pull-right">
                                    <i class="fa fa-paper-plane"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
           
            <div class="the-title">
                <h4>
                    Sản Phẩm Liên Quan
                </h4>
                <img src="images/hinh-anh-trang-chu/logo-leaf.png" />
            </div>

            <div class="product-item">
                <ul>
                    <li class="item">
                        <a href="detail.html" class="product-image">
                            <img src="images/product/rau-qua.png">
                        </a>
                        <div class="info-box">
                            <p class="product-name mb-1">
                                <a href="detail.html"> Rau quả tươi sạch Rau quả tươi sạch Rau quả tươi sạch Rau quả tươi sạch Rau quả tươi sạch Rau quả tươi sạch</a>
                            </p>
                            <div class="price-box">
                                <span class="old-price">
                                    120.000&nbsp;₫
                                </span>
                                <span class="price">
                                    108.000&nbsp;₫
                                </span>
                                <span class="sale">-10%</span>
                                <a href="detail.html" class="btn btn-success">
                                    <i class="fa fa-shopping-cart"></i>
                                    XEM NGAY
                                </a>
                            </div>
                        </div>
                    </li>

                    <li class="item">
                        <a href="detail.html" class="product-image">
                            <img src="images/product/rau-qua.png">
                        </a>
                        <div class="info-box">
                            <p class="product-name mb-1">
                                <a href="detail.html"> Rau quả tươi sạch </a>
                            </p>
                            <div class="price-box">
                                <span class="old-price">
                                    120.000&nbsp;₫
                                </span>
                                <span class="price">
                                    108.000&nbsp;₫
                                </span>
                                <span class="sale">-10%</span>
                                <a href="detail.html" class="btn btn-success">
                                    <i class="fa fa-shopping-cart"></i>
                                    XEM NGAY
                                </a>
                            </div>
                        </div>
                    </li>

                    <li class="item">
                        <a href="detail.html" class="product-image">
                            <img src="images/product/rau-qua.png">
                        </a>
                        <div class="info-box">
                            <p class="product-name mb-1">
                                <a href="detail.html"> Rau quả tươi sạch </a>
                            </p>
                            <div class="price-box">
                                <span class="old-price">
                                    120.000&nbsp;₫
                                </span>
                                <span class="price">
                                    108.000&nbsp;₫
                                </span>
                                <span class="sale">-10%</span>
                                <a href="detail.html" class="btn btn-success">
                                    <i class="fa fa-shopping-cart"></i>
                                    XEM NGAY
                                </a>
                            </div>
                        </div>
                    </li>

                    <li class="item">
                        <a href="detail.html" class="product-image">
                            <img src="images/product/rau-qua.png">
                        </a>
                        <div class="info-box">
                            <p class="product-name mb-1">
                                <a href="detail.html"> Rau quả tươi sạch </a>
                            </p>
                            <div class="price-box">
                                <span class="old-price">
                                    120.000&nbsp;₫
                                </span>
                                <span class="price">
                                    108.000&nbsp;₫
                                </span>
                                <span class="sale">-10%</span>
                                <a href="detail.html" class="btn btn-success">
                                    <i class="fa fa-shopping-cart"></i>
                                    XEM NGAY
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <?php
                        }
                    }
                    ?>
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
        <script src="Scripts/script.js"></script>
        <script src="Scripts/easyzoom.js"></script>
    </div>
</body>
</html>