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
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $tukhoa = $_POST['tukhoa'];
        $search_product = $product->search_product($tukhoa);
    }
    ?>
    <main>
        <div class="list-product container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tìm kiếm</li>
                </ol>
            </nav>

            <?php
            
            if($search_product){
                $i=0;
                while($result = $search_product->fetch_assoc()){ 
                    $i++;                 
            ?>
            <div class="product-item">
                
                <ul>
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
                                    href="detail.php?proid=<?php echo $result['productId']?>" class="btn btn-success">
                                    <i class="fa fa-shopping-cart"></i>
                                    XEM NGAY
                                </a>

                            </div>
                        </div>
                    </li>
                    <?php
                }
            }else{
                echo'
                <div id="not-found">
                        <img src="images/logo/not-found.jpg" />
                        <p>Xin lỗi! Không tìm thấy kết quả nào.</p>
                        <a class="btn btn-success" href="index.html">Thử lại</a>
                    </div>
                ';
            }
                ?>
                </ul>
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