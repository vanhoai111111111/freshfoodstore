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
    <main>
        <div class="list-product container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                </ol>
            </nav>
            <div class="the-title">
                
                <img class="img-fluid" src="images/hinh-anh-trang-chu/logo-leaf.png" />
            </div>
            <div class="product-item">
                <ul>
                    <div id="not-found">
                        <img src="images/logo/not-found.jpg" />
                        <p>Xin lỗi! Không tìm thấy kết quả nào.</p>
                        <a class="btn btn-success" href="index.html">Thử lại</a>
                    </div>
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