<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/freshfoodstore/lib/database.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/freshfoodstore/helper/format.php';
?>
<?php 
 class customer
{
    private $db;
    private $fm; 
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_customers($data){
        $name = mysqli_real_escape_string($this->db->link,$data['name']);
        $email = mysqli_real_escape_string($this->db->link,$data['email']);
        $address = mysqli_real_escape_string($this->db->link,$data['address']);
        $phone = mysqli_real_escape_string($this->db->link,$data['phone']);
        $password = mysqli_real_escape_string($this->db->link,md5($data['password']));

        if($name=="" || $email=="" || $address=="" || $phone=="" || $password==""){
            $alert = '<div class="alert alert-danger" role="alert">Các trường không được bỏ trống!</div>';
            return $alert;
        }
        else{
            $check_email = "SELECT * FROM tbl_customer WHERE email='$email' LIMIT 1";
            $result_check = $this->db->select($check_email);
            if($result_check){
                $alert = '<div class="alert alert-danger" role="alert">Email đã tồn tại , vui lòng đăng ký với email khác!</div>';
            return $alert;
            }
            else{
                $query = "INSERT INTO tbl_customer(name,address,phone,email,password) values('$name','$address','$phone','$email','$password')";
                $result = $this->db->insert($query);
                if($result==true){
                    $alert ='<div class="alert alert-success" role="alert">Đăng ký thành công!</div>';
                
                    return $alert;
                 }else{
                
                    $alert ='<div class="alert alert-danger" role="alert">Đăng ký không thành công!</div>';
                    return $alert;
                 }
            }
        }

    }
    public function login_customers($data){
        $email = mysqli_real_escape_string($this->db->link,$data['email']);
        $password = mysqli_real_escape_string($this->db->link,md5($data['password']));
        if(empty($email) || empty($password)){
            $alert = '<div class="alert alert-danger" role="alert">Các trường không được bỏ trống!</div>';
            return $alert;
        }
        else{
            $check_login = "SELECT * FROM tbl_customer WHERE email='$email' AND password = '$password' LIMIT 1";
            $result_check = $this->db->select($check_login);
            if($result_check){
                $value = $result_check->fetch_assoc();
                Session::set('customer_login',true);
                Session::set('customer_id',$value['id']);
                Session::set('customer_name',$value['name']);
                echo "<script>window.location ='index.php'</script>";
            }
            else{
                $alert = '<div class="alert alert-danger" role="alert">Email hoặc mật khẩu không trùng khớp!</div>';
                return $alert;
            }
        }
    }
    public function show_customer($id){
        $query = "SELECT * FROM tbl_customer WHERE id='$id' LIMIT 1";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_customers($data,$id)
    {
        $name = mysqli_real_escape_string($this->db->link,$data['name']);
        $email = mysqli_real_escape_string($this->db->link,$data['email']);
        $address = mysqli_real_escape_string($this->db->link,$data['address']);
        $phone = mysqli_real_escape_string($this->db->link,$data['phone']);
        $password = mysqli_real_escape_string($this->db->link,md5($data['password']));

        $query = "UPDATE tbl_customer  SET name='$name',address='$address',phone='$phone', WHERE id='$id'";
        $result = $this->db->update($query);
        if($result==true){
            $alert ='<div class="alert alert-success" role="alert">Cập nhật thông tin thành công!</div>';
            return $alert;
         }else{
            $alert ='<div class="alert alert-danger" role="alert">Cập nhật thông tin không thành công!</div>';
            return $alert;
            }
        }
    }
 
?>