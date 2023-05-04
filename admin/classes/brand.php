<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/freshfoodstore/lib/database.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/freshfoodstore/helper/format.php';
?>
<?php 
 class brand
 {
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_brand($brandName)
    {
        $brandName = $this->fm->validation($brandName);

        $brandName = mysqli_real_escape_string($this->db->link,$brandName);

        if(empty($brandName)){
            $alert = "<span>Thương hiệu không được bỏ trống</span>";
            return $alert;
        }
        else{
            $query = "INSERT INTO tbl_brand(brandName) values('$brandName')";
            $result = $this->db->insert($query);
            if($result==true){
                $alert ='<div class="alert alert-success" role="alert">Thêm thương hiệu thành công!</div>';
                
                return $alert;
            }
            else
            {
                $alert ='<div class="alert alert-danger" role="alert">Thêm thương hiệu không thành công!</div>';
                return $alert;
            }
        }
    }
    public function show_brand(){
        $query = "SELECT * FROM tbl_brand order by brandId desc";
        $result = $this->db->insert($query);
        return $result;
    }
    public function update_brand($brandName,$id){
        $brandName = $this->fm->validation($brandName);
        $brandName = mysqli_real_escape_string($this->db->link,$brandName);
        $id = mysqli_real_escape_string($this->db->link,$id);
        if(empty($brandName)){
            $alert = '<div class="alert alert-warning" role="alert">Thương hiệu không được bỏ trống!</div>';
            return $alert;
        }
        else{
            $query = "UPDATE tbl_brand SET brandName = '$brandName' WHERE brandId='$id'";
            $result = $this->db->update($query);
            if($result==true){
                $alert ='<div class="alert alert-success" role="alert">Sửa thương hiệu thành công!</div>';
                
                return $alert;
            }
            else
            {
                $alert ='<div class="alert alert-danger" role="alert">Sửa thương hiệu không thành công!</div>';
                return $alert;
            }
        }
    }
    public function del_brand($id){
        $query = "DELETE FROM tbl_brand where brandId='$id'";
        $result = $this->db->delete($query);
        if($result){
            $alert ='<div class="alert alert-success" role="alert">Xóa thương hiệu thành công!</div>';
            
            return $alert;
        }
        else
        {
            $alert ='<div class="alert alert-danger" role="alert">Xóa thương hiệu không thành công!</div>';
            return $alert;
        }
        return $result;
    }
    public function getbrandbyId($id){
        $query = "SELECT * FROM tbl_brand where brandId='$id'";
        $result = $this->db->insert($query);
        return $result;
    }
 }
 
?>