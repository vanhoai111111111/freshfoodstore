<?php
include_once '../admin/classes/category.php';
?>
<?php
$class = new category();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $catName = $_POST['catName']; 
    
    $insertCat = $class ->insert_category($catName);
}
?>
<?php 
include '../admin/include/header.php';
?>
<!-- Nội dung -->
<div class="workplace">
    <form action="add-product-category.php" method="POST">
        <div class="breadcrumbs">
            <div class="page-header float-right">
                <div class="page-title">

                    <ol class="breadcrumb text-right">
                        <li><a href="/freshfoodstore/admin">Bảng điều khiển</a></li>
                        <li class="active">Thêm danh mục </li>
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
                                <label class="col-md-2 col-form-label">Mã Số:</label>
                                <div class="col-md-3">
                                    <input id="input_ID" class="form-control" type="text" title="Mã số tự động tăng!"
                                        readonly placeholder="Mã Số" />
                                </div>
                                <label class="col-md-2 col-form-label text-center">Vị Trí:</label>
                                <div class="col-md-3">
                                    <input id="input_Position" class="form-control" type="text" placeholder="Vị Trí" />
                                </div>
                            </div>
                            <div class="form-group pb-0 p-2 row">
                                <label class="col-md-2 col-form-label">Tiêu Đề:</label>
                                <div class="col-md-10">
                                    <input name="catName" id="input_Title" value="" class="form-control" type="text"
                                        placeholder="Tiêu Đề" />
                                </div>
                            </div>
                            <div class="form-group row pb-0 p-2">
                                <label class="col-md-2 form-check-label">Tình Trạng:</label>
                                <div class="col-md-10">
                                    <input id="radio_StatusYes" class="form-check-inline" type="radio" checked
                                        name="status" /> Hiển Thị
                                    <input id="radio_StatusNo" class="ml-5 form-check-inline" type="radio"
                                        name="status" />
                                    Ẩn
                                </div>
                            </div>
                            <hr />
                            <!--Save + Messege-->
                            <div class="form-group row pb-0 p-2">
                                <div class="col-md-2 text-center">
                                    <input name="submit" type="submit" class="btn btn-success" />
                                </div>

                            </div>
                            <?php
                                if(isset($insertCat)){
                                    echo $insertCat;
                                }
                                ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>
</form>
</div>
</div>
</div>
<?php 
include '../admin/include/script.php';
?>
</form>
</body>

</html>