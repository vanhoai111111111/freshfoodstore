<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/freshfoodstore/lib/session.php';
Session::init();
?>
<?php 
 include_once 'admin/classes/category.php';
 include_once 'admin/classes/brand.php';
 include_once 'admin/classes/product.php';
 include_once 'admin/classes/user.php';
 include_once 'admin/classes/cart.php';
 include_once 'admin/classes/customer.php';
?>

<?php
include_once 'lib/database.php';
include_once 'helper/format.php'; 


$db = new Database();
$fm = new Format();
$cat = new category();
$ct = new cart();
$us = new user();
$cs = new customer();
$product = new product();
?>
    <meta charset="utf-8" />
    <title>Fresh Food store | Thực phẩm sạch</title>
    <link rel="shortcut icon" href="images/logo/favicon.ico" />
    <link href="Content/bootstrap.css" rel="stylesheet" />
    <link href="Content/font-awesome.css" rel="stylesheet" />
    <link href="Content/style.css" rel="stylesheet" /> 