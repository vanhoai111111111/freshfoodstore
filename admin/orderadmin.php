<?php 
include_once '../admin/include/header.php';
?>
<?php include_once '../admin/classes/cart.php';?>
<?php include_once '../helper/format.php';?>
<?php
$ct = new cart();
if(isset($_GET['shiftid'])){
    $id = $_GET['shiftid'];
    $time = $_GET['time'];
    $price = $_GET['price'];
    $shifted = $ct ->shifted($id,$time,$price);
}
if(isset($_GET['delid'])){
    $id = $_GET['delid'];
    $time = $_GET['time'];
    $price = $_GET['price'];
    $del_shifted = $ct ->del_shifted($id,$time,$price);
}
?>
<div class="workplace">
    <div class="row pt-2">
        <!-- list -->
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Danh sách sản phẩm</h3>
                    <span class="panel-controls">
                        <a href="add-product.php" title="Thêm Mới"><i class="fa fa-plus"></i></a>
                    </span>
                </div>
                <div class="panel-content">                  
                    <table class="table table-striped table-bordered pt-2 text-center">
                        <thead class="table-success">
                            <tr>
                                <th width="160" scope="col" class="align-middle">STT</th>
                                <th width="160" scope="col" class="align-middle">ID Khách hàng</th>
                                <th width="120" class="align-middle">Thời gian đặt</th>
                                <th width="200" scope="col" class="align-middle">Sản phẩm</th>
                                <th width="200" scope="col" class="align-middle">Số lượng</th>
                                <th width="200" scope="col" class="align-middle">Giá</th>
                                <th width="200" scope="col" class="align-middle">Tình trang</th>
                                <th width="200" scope="col" class="align-middle">Địa chỉ</th>
                                <th width="200" scope="col" class="align-middle">Chức năng</th>

                            </tr>
                        </thead>
                        <tbody> 
                            <?php
                            $ct = new cart();
                            $fm = new Format();
                            $get_inbox_cart = $ct->get_inbox_cart();
                            if($get_inbox_cart){
                                $i=0;
                                while($result = $get_inbox_cart->fetch_assoc()){
                                    $i++;
                            ?>                        
                            <tr>
                           
                                <td class="align-middle">
                                  <?php echo $i?>
                                </td>
                                <td class="align-middle">
                                <?php echo $result['customer_id']?>
                                </td>
                                <td class="align-middle">
                                    <?php echo $fm->formatDate($result['date_order'])?>
                                </td>
                                <td class="align-middle">
                                    <?php echo $result['productName']?>
                                </td>
                                <td class="align-middle">
                                    <?php echo $result['quantity']?>
                                </td>
                                <td class="align-middle">
                                    <?php echo $result['price'].' '.'VNĐ'?>
                                </td>
                                <td class="align-middle">
                                <?php
                                    if($result['status']==0){
                                        echo "Đang xử lý";
                                    }else{
                                        echo "Đã hoàn tất";
                                    }
                                    ?>
                                </td>
                                <td class="align-middle">
                                    <a href="customer.php?customerid=<?php echo $result['customer_id']?>">Xem khách hàng</a>
                                </td>
                                
                                <td class="align-middle">
                                    <?php
                                    if($result['status']==0){
                                    ?>
                                        <a href="?shiftid=<?php echo $result['id']?>&price=<?php echo $result['price']?>&time=<?php echo $result['date_order']?>">Đã vận chuyển</a>
                                    <?php
                                    }else{
                                    ?>
                                        <a href="?delid=<?php echo $result['id']?>&price=<?php echo $result['price']?>&time=<?php echo $result['date_order']?>">Remove</a>
                                    <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>     
                        <?php
                    if(isset($shifted))
                        echo $shifted;
                    ?>      
                     <?php
                    if(isset($del_shifted))
                        echo $del_shifted;
                    ?>               
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
        include '../admin/include/script.php';
        ?>
</body>

</html>