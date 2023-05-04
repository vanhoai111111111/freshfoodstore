<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/freshfoodstore/lib/database.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/freshfoodstore/helper/format.php';
?>
<?php 
 class category
 {
    private $db;
    private $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_category($catName)
    {
        $catName = $this->fm->validation($catName);

        $catName = mysqli_real_escape_string($this->db->link,$catName);

        if(empty($catName)){
            $alert = "<span>Danh mục không được bỏ trống</span>";
            return $alert;
        }
        else{
            $query = "INSERT INTO tbl_category(catName) values('$catName')";
            $result = $this->db->insert($query);
            if($result==true){
                $alert ='<div class="alert alert-success" role="alert">Thêm danh mục thành công!</div>';
                
                return $alert;
            }
            else
            {
                $alert ='<div class="alert alert-danger" role="alert">Thêm danh mục không thành công!</div>';
                return $alert;
            }
        }
    }
    public function show_catergory(){
        $query = "SELECT * FROM tbl_category order by catId desc";
        $result = $this->db->insert($query);
        return $result;
    }
    public function show_catergory_index(){
        $query = "SELECT * FROM tbl_category order by catId desc";
        $result = $this->db->insert($query);
        return $result;
    }
    public function update_category($catName,$id){
        $catName = $this->fm->validation($catName);
        $catName = mysqli_real_escape_string($this->db->link,$catName);
        $id = mysqli_real_escape_string($this->db->link,$id);
        if(empty($catName)){
            $alert = '<div class="alert alert-warning" role="alert">Danh mục không được bỏ trống!</div>';
            return $alert;
        }
        else{
            $query = "UPDATE tbl_category SET catName = '$catName' WHERE catId='$id'";
            $result = $this->db->update($query);
            if($result==true){
                $alert ='<div class="alert alert-success" role="alert">Sửa danh mục thành công!</div>';
                
                return $alert;
            }
            else
            {
                $alert ='<div class="alert alert-danger" role="alert">Sửa danh mục không thành công!</div>';
                return $alert;
            }
        }
    }
    public function del_category($id){
        $query = "DELETE FROM tbl_category where catId='$id'";
        $result = $this->db->delete($query);
        if($result){
            $alert ='<div class="alert alert-success" role="alert">Xóa danh mục thành công!</div>';
            
            return $alert;
        }
        else
        {
            $alert ='<div class="alert alert-danger" role="alert">Xóa danh mục không thành công!</div>';
            return $alert;
        }
        return $result;
    }
    public function getcatbyId($id){
        $query = "SELECT * FROM tbl_category where catId='$id'";
        $result = $this->db->insert($query);
        return $result;
    }
    public function get_product_by_cat($id)
    {
        $query = "SELECT * FROM tbl_product where catId='$id' order by catId desc";
        $result = $this->db->select($query);
        return $result;
    }
 }
 
?>