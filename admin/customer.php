<?php 
include_once '../admin/include/header.php';
?>
<?php include_once '../admin/classes/customer.php';?>
<?php include_once '../helper/format.php';?>

<?php
$cs = new customer();
if(!isset($_GET['customerid']) || $_GET['customerid']== null){
    echo "<script>window.location ='orderadmin.php'</script>";
}
else{
    $id=$_GET['customerid'];
}
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $catName = $_POST['catName']; 
//     $updateCat = $cat ->update_category($catName,$id);
// }
?>
<!-- Nội dung -->
<div class="workplace">
    <?php
            $get_customer = $cs->show_customer($id);
                if($get_customer){
                while($result = $get_customer->fetch_assoc()){
                ?>
    <form method="POST">
        <div class="breadcrumbs">
            <div class="page-header float-right">
                <div class="page-title">

                    <ol class="breadcrumb text-right">
                        <li><a href="/freshfoodstore/admin">Bảng điều khiển</a></li>
                        <li class="active">Khách hàng</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- Nội dung -->
        <div class="workplace">
            <!-- detail -->
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Chi Tiết</h3>
                    </div>
                    <div class="panel-content">
                        <div class="form-group row pb-0 p-2">
                            <label class="col-md-2 col-form-label">Họ và tên:</label>
                            <div class="col-md-3">
                                <input id="input_ID" name="name" value="<?php echo $result['name']?>" class="form-control" type="text"
                                    readonly  />
                            </div>
                        </div>
                        <div class="form-group row pb-0 p-2">
                            <label class="col-md-2 col-form-label">Số điện thoại:</label>
                            <div class="col-md-3">
                                <input id="input_ID" name="name" value="<?php echo $result['phone']?>" class="form-control" type="text"
                                    readonly  />
                            </div>
                        </div>
                        <div class="form-group row pb-0 p-2">
                            <label class="col-md-2 col-form-label">Địa chỉ:</label>
                            <div class="col-md-3">
                                <input id="input_ID" name="name" value="<?php echo $result['address']?>" class="form-control" type="text"
                                    readonly  />
                            </div>
                        </div>
                        <div class="form-group row pb-0 p-2">
                            <label class="col-md-2 col-form-label">Email:</label>
                            <div class="col-md-3">
                                <input id="input_ID" name="name" value="<?php echo $result['email']?>" class="form-control" type="text"
                                    readonly  />
                            </div>
                        </div>
                        <hr />
                    </div>
                </div>
            </div>
        </div>
</div>

</div>
</form>
<?php
            }
        }
?>
</div>
</div>
</div>
<?php 
include '../admin/include/script.php';
?>
</form>
</body>

</html>