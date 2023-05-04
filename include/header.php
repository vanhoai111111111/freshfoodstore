<header class="sticky-top">
    <nav id="main-menu" class="navbar navbar-expand-lg navbar-light bg-lightk">
        <div class="container">
            <div class="pull-left">
                <a class="navbar-brand" href="/freshfoodstore">
                    <img src="images/logo/logo.png" />
                </a>
            </div>
            <div class="search">
                <form class="search-box top-search" method="POST" action="search.php">
                    <input name="tukhoa" class="form-control form-control-lg text-seach" type="text"
                        placeholder="Tên sản phẩm bạn cần tìm..." >
                    <button name="search_product" class="btn" type="submit"  value="Tìm kiếm">
                        <i class="fa fa-search" style="font-size: 22px"></i>
                    </button>
                </form>
            </div>
            <div class="collapse navbar-collapse pull-right" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto pull-right">
                    <li class="nav-item active">
                        <a class="nav-link" href="/freshfoodstore">Trang chủ</a>
                    </li>
                    <li class="nav-item dropdown">
                        <div class="menu-product">
                            <a class="nav-link dropdown-toggle" href="all-product.php">
                                Danh mục
                            </a>
                            <ul class='level0'>
                                <li class="child">
                                    <?php
                                    $getall_category = $cat->show_catergory_index();
                                    if($getall_category){
                                            while ($result_allcat = $getall_category->fetch_assoc()) {
                                        ?>
                                            <a href="list-product.php?catid=<?php echo $result_allcat['catId']?>"><?php echo $result_allcat['catName']?></a>
                                        <?php
                                    }
                                }
                                    ?>
                                    
                                    
                                </li>
                                

                                <!-- <li class="child">
                                    <a href="#">Thức uống<i class="fa fa-angle-right"></i></a>
                                    <ul class='level1 hidden-xs'>
                                        <li><a href="#">Sữa</a></li>
                                        <li><a href="#">Nước ép</a></li>
                                    </ul>
                                </li> -->
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="news.html">Bài viết</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Liên hệ</a>
                    </li>
                    <li class="nav-item icon">
                        <div class="menu-product">
                            <a class="nav-link" href="#">
                                <i class="fa fa-user-circle"></i>
                            </a>
                            <ul>
                                <?php
                                if(isset($_GET['customer_id'])){
                                    $delCart = $ct->del_all_data_cart();
                                    Session::destroy();
                                }
                                ?>
                                <?php
                                $login_check = Session::get('customer_login');
                                if($login_check==false){
                                    echo '
                                    <li>
                                    <a class="w-75" href="login.php">Đăng nhập</a>
                                    </li>
                                    <li>
                                        <a class="w-75" href="login.php">Đăng ký</a>
                                    </li>';
                                }
                                else{
                                    echo '<li>
                                                <a class="w-75" href="personal.php">Trang cá nhân</a>
                                        </li>
                                        <li>
                                            <a class="w-75" href="?customer_id='.Session::get('customer_id').'">Đăng xuất</a>
                                        </li>';
                                }
                                ?>
                                
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item icon">
                        <div class="menu-product">
                            <a class="nav-link giohang" href="cart.php">
                                <i class="fa fa-shopping-cart"></i>
                                <span id="span_Count" class="sogiohang">
                                    <?php
                                    $check_cart = $ct ->check_cart();
                                    if($check_cart){
                                        $qty = Session::get("qty");
                                        echo $qty;
                                    }else{
                                        echo '0';
                                    }
                                ?></span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>