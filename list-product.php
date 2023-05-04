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
    if(!isset($_GET['catid']) || $_GET['catid']== null){
        echo "<script>window.location ='404.php'</script>";
    }
    else{
        $id=$_GET['catid'];
    }
    // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //     $catName = $_POST['catName']; 
    //     $updateCat = $cat ->update_category($catName,$id);
    // }
    ?>
    <main>
        <div class="list-product container">
            <div class="the-title">
                <h2>
                    Trái cây tươi
                </h2>
                <img class="img-fluid" src="images/hinh-anh-trang-chu/logo-leaf.png" />
            </div>
            <div class="product-item">
                <ul>
                    <?php
                    $productbycat = $cat->get_product_by_cat($id);
                    if($productbycat){
                        while($result = $productbycat->fetch_assoc()){
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