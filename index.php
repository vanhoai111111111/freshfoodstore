<!DOCTYPE html>
<html>

<head>
    <?php
    include_once 'include/css.php'
    ?>
    <meta name="google-site-verification" content="004RUphZ2j62l3a2T2lYPzaPZ4Ft4G0Vz7xJaH15NVM" />
</head>

<body style="background-color: #fff">

    <?php
    include_once 'include/header.php'
    ?>
    <main>
        <?php
    include_once 'include/slider.php'
    ?>

        <div class="row certificate">
            <div class="col-2"></div>
            <div class="col-2">
                <div class="chungchi">
                    <i class="fa fa-truck"></i>
                    Giao hàng nhanh
                </div>
            </div>
            <div class="col-2">
                <div class="chungchi">
                    <i class="fa fa-address-book-o"></i>
                    Chứng chỉ hữu cơ
                </div>
            </div>
            <div class="col-2">
                <div class="chungchi">
                    <i class="fa fa-heart-o"></i>
                    Lợi cho sức khỏe
                </div>
            </div>
            <div class="col-2">
                <div class="chungchi">
                    <i class="fa fa-refresh"></i>
                    Xanh, Sạch
                </div>
            </div>
            <div class="col-2"></div>
        </div>

        <div class="product container">
            <div class="the-title">
                <h2>
                    Mặt hàng nổi bật
                </h2>
                <img class="img-fluid" src="images/hinh-anh-trang-chu/logo-leaf.png" />
            </div>
            <div class="product-item">
                <ul>
                    <?php
            $product_featured = $product->getproduct_featured();
                if($product_featured){
                    while($result = $product_featured->fetch_assoc()){
            ?>

                    <li class="item">
                        <a href="detail.php?proid=<?php echo $result['productId']?>" class="product-image">
                            <img src="admin/uploads/<?php echo $result['image']?>" />
                        </a>
                        <div class="info-box">
                            <p class="product-name mb-1">
                                <a
                                    href="detail.php?proid=<?php echo $result['productId']?>"><?php echo $result['productName']?></a>
                            </p>
                            <div class="price-box">
                                <span class="price clearfix align-center">
                                    <?php echo $result['price']." "."VNĐ"?>
                                </span>
                                <a style="align-items: center; display: flex; justify-content: center;"
                                    href="detail.php?proid=<?php echo $result['productId']?>" class="btn btn-success">
                                    <i class="fa fa-shopping-cart"></i>
                                    XEM NGAY
                                </a>
                            </div>
                        </div>
                    </li>
                    <?php
                }
            }
                ?>
                </ul>
            </div>
        </div>

        <div class="row preferential">
            <div class="col-7">
                <div class="pull-right">
                    Giảm 25% cho lần mua hàng đầu tiên!
                </div>
            </div>
            <div class="col-5">
                <a href="list-product.html" class="btn btn-secondary">
                    <i class="fa fa-shopping-cart"></i>
                    MUA NGAY
                </a>
            </div>
            <div class="container">
                <svg viewBox="0 0 700 10">
                    <path d="M350,10L340,0h20L350,10z"></path>
                </svg>
            </div>
        </div>
        <div class="for-registration">
            <div class="text-center">
                <a href="login.html">Đăng Ký Ngay Để Nhận Ưu Đãi.</a>
            </div>
        </div>

        <div class="last">
            <div class="background-leaf"></div>
            <div class="product container">
                <div class="the-title">
                    <h2>
                        Mặt hàng mới
                    </h2>
                    <img class="img-fluid" src="images/hinh-anh-trang-chu/logo-leaf.png" />
                </div>
                <div class="product-item">
                    <ul>
                        <?php
                
                    $product_new = $product->getproduct_new();
                        if($product_new){
                            while($result = $product_new->fetch_assoc()){
                    ?>

                        <li class="item">
                            <a href="detail.php?proid=<?php echo $result_new['productId']?>" class="product-image">
                                <img src="admin/uploads/<?php echo $result['image']?>" />
                            </a>
                            <div class="info-box">
                                <p class="product-name mb-1">
                                    <a
                                        href="detail.php?proid=<?php echo $result_new['productId']?>"><?php echo $result['productName']?></a>
                                </p>
                                <div class="price-box">
                                    <span class="price clearfix align-center">
                                        <?php echo $result['price']." "."VNĐ"?>
                                    </span>
                                    <a style="align-items: center; display: flex; justify-content: center;"
                                        href="detail.php?proid=<?php echo $result['productId']?>"
                                        class="btn btn-success">
                                        <i class="fa fa-shopping-cart"></i>
                                        XEM NGAY
                                    </a>
                                </div>
                            </div>
                        </li>
                        <?php
                }
            }
                ?>
                    </ul>

                </div>
                <nav aria-label="Page navigation example">
                     <ul class="pagination justify-content-center">
                        <?php
                $product_all = $product->get_all_product();
                $product_count = mysqli_num_rows($product_all);
                $product_button = ceil($product_count/4);
                $i=1;
                
                for($i=1;$i<=$product_button;$i++){
                   echo'
                    <li class="page-item"><a class="page-link" href="index.php?trang='.$i.'">'.$i.'</a></li>
                   ';

                }
            ?>
                    </ul>
                </nav>
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
        <script src="Scripts/script.js"></script>
    </div>
</body>

</html>