<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/freshfoodstore/lib/database.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/freshfoodstore/helper/format.php';
?>
<?php 
 class cart
 {
    private $db;
    private $fm; 
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function add_mua($quantity,$id){

        $quantity = $this->fm->validation($quantity);
        $quantity = mysqli_real_escape_string($this->db->link,$quantity);
        $id = mysqli_real_escape_string($this->db->link,$id);
        $sId = session_id();

        $querry = "SELECT * FROM tbl_product WHERE productId='$id'";
        $result = $this->db->select($querry)->fetch_assoc();
        
        $image = $result["image"];
        $price = $result["price"];
        $productName = $result["productName"];

        $query_insert = "INSERT INTO tbl_cart(productId,quantity,sId,image,price,productName) values('$id','$quantity','$sId','$image','$price','$productName')";
        $insert_cart = $this->db->insert($query_insert);
        if($result){
        echo "<script>window.location ='cart.php'</script>";
        }else{
            header('Location:404.php');
        }
    }
    public function add_to_card($quantity,$id){

        $quantity = $this->fm->validation($quantity);
        $quantity = mysqli_real_escape_string($this->db->link,$quantity);
        $id = mysqli_real_escape_string($this->db->link,$id);
        $sId = session_id();

        $querry = "SELECT * FROM tbl_product WHERE productId='$id'";
        $result = $this->db->select($querry)->fetch_assoc();
        
        $image = $result["image"];
        $price = $result["price"];
        $productName = $result["productName"];

        $query_insert = "INSERT INTO tbl_cart(productId,quantity,sId,image,price,productName) values('$id','$quantity','$sId','$image','$price','$productName')";
        $insert_cart = $this->db->insert($query_insert);
       
    }
        public function get_product_cart(){
            $sId = session_id();
            $query = "SELECT * FROM tbl_cart WHERE sId='$sId'";
            $result = $this->db->select($query);
            return $result;
        }
        public function update_quantity_cart($quantity,$cartId){
            $quantity = mysqli_real_escape_string($this->db->link,$quantity);
            $cartId = mysqli_real_escape_string($this->db->link,$cartId);
            $query = "UPDATE tbl_cart SET 
                quantity = '$quantity'

                WHERE cartId= '$cartId'";

        $result = $this->db->update($query);
        if($result){
            $msg="<div class='alert alert-success' role='alert'> Số lượng sản phẩm đã được cập nhật</div>";
            return $msg;
        }
        else{
            $msg="<div class='alert alert-warning' role='alert'> Số lượng sản phẩm không được cập nhật</div>";
            return $msg;
        }

        }
        public function del_product_cart($cartid){
            $cartid = mysqli_real_escape_string($this->db->link,$cartid);
            $query = "DELETE FROM tbl_cart WHERE cartId= '$cartid'";
            $result = $this->db->delete($query);
            if($result){
                echo "<script>window.location ='cart.php'</script>";
            }
            else{
                $msg="<div class='alert alert-warning' role='alert'> Sản phẩm không được xóa</div>";
                return $msg;
            }
        }


        public function check_cart(){
            $sId = session_id();
            $query = "SELECT * FROM tbl_cart WHERE sId= '$sId'";
            $result = $this->db->select($query);
            return $result;
        }
        public function del_all_data_cart(){
            $sId = session_id();
            $query = "DELETE FROM tbl_cart WHERE sId= '$sId'";
            $result = $this->db->select($query);
            return $result;
        }
       /* public function insertOrder1($customer_id)
        {
            $sId = session_id();
            $query = "SELECT * FROM tbl_cart WHERE sId= '$sId'";
            $get_product = $this->db->select($query);
            if($get_product){
                while($result = $get_product->fetch_assoc()){
                    $productid = $result['productId'];
                    $productName = $result['productName'];
                    $quantity = $result['quantity'];
                    $price = $result['price'];
                    $image = $result['image'];
                    $customer_id = $customer_id;

                    $query_order = "INSERT INTO tbl_order(productId,productName,quantity,price,image,customer_id) values('$productid','$productName','$quantity','$price','$image','$customer_id')";                    
                    $insert_order = $this->db->insert($query_order);
                    $query_order1 = "  UPDATE tbl_product SET 
                    soluong = 'soluong - $quantity '
                    WHERE productId='$id'";                 
                    $insert_order = $this->db->insert($query_order1);
                }
            }
        } */
         public function insertOrder($customer_id)
        {
    $sId = session_id();
    $query = "SELECT * FROM tbl_cart WHERE sId= '$sId'";
    $get_product = $this->db->select($query);
    if($get_product){
        while($result = $get_product->fetch_assoc()){
            $productid = $result['productId'];
            $productName = $result['productName'];
            $quantity = $result['quantity'];
            $price = $result['price'];
            $image = $result['image'];
            $customer_id = $customer_id;

            $query_order = "INSERT INTO tbl_order(productId,productName,quantity,price,image,customer_id) values('$productid','$productName','$quantity','$price','$image','$customer_id')";                    
            $insert_order = $this->db->insert($query_order);
            $query_select_product = "SELECT * FROM tbl_product WHERE productId='$productid'";
            $product = $this->db->select($query_select_product)->fetch_assoc();
            if ($product) {
                $remaining_quantity = $product['soluong'] - $quantity;
                if ($remaining_quantity < 0) {
                    // Trường hợp số lượng tồn kho không đủ để thực hiện đơn hàng
                    // Xử lý theo yêu cầu, ví dụ:
                    echo "Số lượng sản phẩm '$productName' không đủ để thực hiện đơn hàng.";
                } else {
                    $query_update_product = "UPDATE tbl_product SET soluong = '$remaining_quantity' WHERE productId='$productid'";
                    $update_product = $this->db->update($query_update_product);
                }
            } 
        }
    }
}
        public function get_inbox_cart()
        {
            $query = "SELECT * FROM tbl_order order by date_order";
            $get_inbox_cart = $this->db->select($query);
            return $get_inbox_cart;
        }
        public function shifted($id,$time,$price)
        {
            $id = mysqli_real_escape_string($this->db->link,$id);
            $time = mysqli_real_escape_string($this->db->link,$time);
            $price = mysqli_real_escape_string($this->db->link,$price);
         
            $query = "UPDATE tbl_order SET 
                status = '1'

                WHERE id='$id' AND date_order='$time' AND price='$price'";

                $result = $this->db->update($query);
                if($result){
                    $msg="<div class='alert alert-success' role='alert'>Cập nhật trang thái thành công</div>";
                    return $msg;
                }
                else{
                    $msg="<div class='alert alert-warning' role='alert'>Cập nhật trang thái không thành công</div>";
                    return $msg;
                }
        }
        public function del_shifted($id,$time,$price){
            $id = mysqli_real_escape_string($this->db->link,$id);
            $time = mysqli_real_escape_string($this->db->link,$time);
            $price = mysqli_real_escape_string($this->db->link,$price);
         
            $query = "DELETE FROM tbl_order
                WHERE id='$id' AND date_order='$time' AND price='$price'";

                $result = $this->db->update($query);
                if($result){
                    $msg="<div class='alert alert-success' role='alert'>Xóa đơn hàng thành công</div>";
                    return $msg;
                }
                else{
                    $msg="<div class='alert alert-warning' role='alert'>Xóa đơn hàng thành côngg</div>";
                    return $msg;
                }
        }
    }
?>