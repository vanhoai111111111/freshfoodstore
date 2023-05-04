
<?php
include '../lib/session.php';
Session::checkSession();
?>
<!DOCTYPE html>

<html>

<?php 
include '../admin/include/css.php';
?>

<body>
    
        
    
        <div class="wrapper d-flex ">
            <!-- Menu - Left -->
            <?php
            include '../admin/include/leftadmin.php';
            ?>
            <div id="content">
                <!-- Header - Right -->
                <header class="header">
                    <div class="row">
                        <div class="col-sm-9">
                            <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                            <div class="page-header float-left">
                                <h1>Xin chào, <span id="a_FullName"><?php echo Session::get('adminName') ?></span>!</h1>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="user-area-custome dropdown">
                                <a href="/admin/order-list.aspx">
                                    <i class="fa fa-bell"></i>
                                    <span id="span_Order" class="badge badge-danger badge-counter"></span>
                                </a>
                            </div>
                            <div class="user-area-custome">
                                <a href="/admin/reviews.aspx">
                                    <i class="fa fa-comment"></i>
                                    <span id="span_Review"
                                        class="badge badge-danger badge-counter"></span>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="user-area dropdown float-right">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="../admin/images/avt.jpg" class="user-avatar rounded-circle" />
                                </a>
                                <div class="user-menu dropdown-menu">
                                    <a id="a_ChangePassword" class="nav-link"
                                        href="/admin/admin-detail.aspx"><i class="fa fa-user mr-1"></i> Thông Tin</a>
                                    <a class="nav-link" title="View" target="_blank" href="/Default.aspx"><i
                                            class="fa fa-eye mr-1"></i> Xem Trang Chủ</a>
                                            <?php 
                                        if(isset($_GET['action']) && $_GET['action']=='logout'){
                                            Session::destroy();
                                        }
                                        ?>
                                    
                                        <a onclick="return confirm('Bạn muốn đăng xuất khỏi FreshFood Administrator?')" class="nav-link" href="?action=logout"> <i class="fa fa-power-off"></i> Đăng xuất</a>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <div class="breadcrumbs">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li class="active">Bảng điều khiển</li>
                            </ol>
                        </div>
                    </div>
                </div>
                