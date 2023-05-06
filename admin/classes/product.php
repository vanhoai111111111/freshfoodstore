<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/freshfoodstore/lib/database.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/freshfoodstore/helper/format.php';
?>
<?php 
 class product
 {
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_product($data,$files)
    {
        $productName = mysqli_real_escape_string($this->db->link,$data['productName']);
        $brand = mysqli_real_escape_string($this->db->link,$data['brand']);
        $category = mysqli_real_escape_string($this->db->link,$data['category']);
        $description = mysqli_real_escape_string($this->db->link,$data['description']);
        $type = mysqli_real_escape_string($this->db->link,$data['type']);
        $price = mysqli_real_escape_string($this->db->link,$data['price']);
        $soluong = mysqli_real_escape_string($this->db->link,$data['soluong']);
       
        $permited = array('jpg','jpeg','png','gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.',$file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()),0,10).','.$file_ext;
        $uploaded_image = "uploads/".$unique_image;



        if($productName=="" || $brand=="" || $category=="" || $description=="" || $price=="" || $type=="" || $file_name==""|| $soluong==""){
            $alert = '<div class="alert alert-danger" role="alert">Các trường không được bỏ trống!</div>';
            return $alert;
        }
        else{
            move_uploaded_file($file_temp,$uploaded_image);
            $query = "INSERT INTO tbl_product(productName,catId,brandId,description,type,price,image,soluong) values('$productName','$category','$brand','$description','$type','$price','$unique_image','$soluong')";
            $result = $this->db->insert($query);
            if($result==true){
                $alert ='<div class="alert alert-success" role="alert">Thêm sản phẩm thành công!</div>';
                
                return $alert;
            }
            else
            {
                
                $alert ='<div class="alert alert-danger" role="alert">Thêm sản phẩm không thành công!</div>';
                return $alert;
            }
        }
    }
    public function show_product(){
        $query = "SELECT tbl_product.*,tbl_category.catName,tbl_brand.brandName
        FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId
                        INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId
        order by tbl_product.productId desc";
        // $query = "SELECT * FROM tbl_product order by productId desc";
        $result = $this->db->insert($query);
        return $result;
    }
    public function update_product($data,$files,$id){
        $productName = mysqli_real_escape_string($this->db->link,$data['productName']);
        $brand = mysqli_real_escape_string($this->db->link,$data['brand']);
        $category = mysqli_real_escape_string($this->db->link,$data['category']);
        $description = mysqli_real_escape_string($this->db->link,$data['description']);
        $type = mysqli_real_escape_string($this->db->link,$data['type']);
        $price = mysqli_real_escape_string($this->db->link,$data['price']);
        $soluong = mysqli_real_escape_string($this->db->link,$data['soluong']);
        $permited = array('jpg','jpeg','png','gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.',$file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()),0,10).','.$file_ext;
        $uploaded_image = "uploads/".$unique_image;

        if($soluong=="" || $productName=="" || $brand=="" || $category=="" || $description=="" || $price=="" || $type==""){
            $alert = '<div class="alert alert-danger" role="alert">Các trường không được bỏ trống!</div>';
            return $alert;
        }else{
            if(!empty($file_name)){
                if($file_size > 2048576){
                    
                    $alert =  '<div class="alert alert-danger" role="alert">Hình ảnh nên ít hơn 2MB!</div>';
                    return $alert;
                }
                elseif(in_array($file_ext,$permited)==false)
                {
                    $alert = "<div class='alert alert-danger' role='alert'>Bạn chỉ có thể upload:-".implode(',',$permited).!"</div>";
                    return $alert;
                }
                move_uploaded_file($file_temp,$uploaded_image);
                $query = "UPDATE tbl_product SET 
                productName = '$productName',
                brandId = '$brand',
                catId = '$category',
                type = '$type',
                price = '$price',
                image = '$unique_image',
                description = '$description',
                soluong = '$soluong' 
                WHERE productId='$id'";
            }else{
                $query = "UPDATE tbl_product SET 
                productName = '$productName',
                brandId = '$brand',
                catId = '$category',
                type = '$type',
                price = '$price',
                description = '$description',
                soluong = '$soluong'
                WHERE productId='$id'";
            }          
            $result = $this->db->update($query);
            if($result==true){
                $alert ='<div class="alert alert-success" role="alert">Sửa sản phẩm thành công!</div>';               
                return $alert;
            }else{
                $alert ='<div class="alert alert-danger" role="alert">Sửa sản phẩm không thành công!</div>';
                return $alert;
            }
        }
    }
    public function del_product($id){
        $query = "DELETE FROM tbl_product where productId='$id'";
        $result = $this->db->delete($query);
        if($result){
            $alert ='<div class="alert alert-success" role="alert">Xóa sản phẩm thành công!</div>';
            
            return $alert;
        }
        else
        {
            $alert ='<div class="alert alert-danger" role="alert">Xóa sản phẩm không thành công!</div>';
            return $alert;
        }
        return $result;
    }
    public function getproductbyId($id){
        $query = "SELECT * FROM tbl_product where productId='$id'";
        $result = $this->db->insert($query);
        return $result;
    }
    public function getproduct_featured(){
        $query = "SELECT * FROM tbl_product where type='1' LIMIT 8";
        $result = $this->db->insert($query);
        return $result;
    }
    public function getproduct_new(){
        $sp_tungtrang = 4;
        if(!isset($_GET['trang'])){
            $trang = 1;
        }else{
            $trang = $_GET['trang'];
        }
        $tung_trang = ($trang-1)*$sp_tungtrang;
        $query = "SELECT * FROM tbl_product order by productId desc LIMIT $tung_trang,$sp_tungtrang";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_all_product(){
        $query = "SELECT * FROM tbl_product order by productId desc";
        $result = $this->db->select($query);
        return $result;
    }
    public function get_details($id){
        $query = "SELECT tbl_product.*,tbl_category.catName,tbl_brand.brandName, count(tbl_order.quantity) as ban
        FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId
                            INNER JOIN tbl_order ON tbl_product.productId = tbl_order.productId
                        INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId
        WHERE tbl_product.productId = '$id'
        ";
        $result = $this->db->insert($query);
        return $result;
    }
    public function search_product($tukhoa)
    {
        $tukhoa = $this->fm->validation($tukhoa);
        $query = "SELECT * FROM tbl_product WHERE productName LIKE '%$tukhoa%'";
        $result = $this->db->select($query);
        return $result;
    }
 }
 
?>