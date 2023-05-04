<?php 
include_once '../admin/include/header.php';
?>
<?php include_once '../admin/classes/category.php';?>
<?php include_once '../admin/classes/brand.php';?>
<?php include_once '../admin/classes/product.php';?>
<?php
$pd = new product();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    
    $insertProduct = $pd ->insert_product($_POST,$_FILES);
}
?>
<div class="workplace">
    <form action="add-product.php" method="POST" enctype="multipart/form-data">
        <div class="row pt-2">
            <!-- list -->
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Thêm sản phẩm</h3>
                    </div>
                    <div class="panel-content">
                        <div class="form-group row pb-0 p-2">
                            <label class="col-md-2 col-form-label">Loại Sản Phẩm:</label>
                            <div class="col-md-10">
                                <select name="category" class="form-control">
                                    <option>-----Chọn loại sản phẩm-----</option>

                                    <?php 
                                $cat = new category();
                                $catlist = $cat ->show_catergory();
                                if($catlist){
                                    while($result=$catlist->fetch_assoc()){                               
                                ?>
                                    <option value="<?php echo $result['catId']?>"><?php echo $result['catName']?>
                                    </option>
                                    <?php
                                    }
                                }
                                 ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row pb-0 p-2">
                            <label class="col-md-2 col-form-label">Thương hiệu sản phẩm:</label>
                            <div class="col-md-10">
                                <select name="brand" class="form-control">
                                    <option>-----Chọn loại thương hiệu-----</option>

                                    <?php 
                                $brand = new brand();
                                $brandlist = $brand ->show_brand();
                                if($brandlist){
                                    while($result=$brandlist->fetch_assoc()){                               
                                ?>
                                    <option value="<?php echo $result['brandId']?>"><?php echo $result['brandName']?>
                                    </option>
                                    <?php
                                    }
                                }
                                 ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row pb-0 p-2">
                            <label class="col-md-2 col-form-label">Mã Số:</label>
                            <div class="col-md-2">
                                <input id="input_ID" class="form-control" type="text" readonly
                                    title="Mã số tự động, không cần nhập!" placeholder="Mã số" />
                            </div>
                            <label class="col-md-2 col-form-label text-center">Vị Trí:</label>
                            <div class="col-md-2">
                                <input id="input_Position" class="form-control" type="text" placeholder="Vị Trí" />
                            </div>
                        </div>
                        <div class="form-group pb-0 p-2 row">
                            <label class="col-md-2 col-form-label">Tên Sản Phẩm:</label>
                            <div class="col-md-10">
                                <input id="input_Title" name="productName" class="form-control" type="text"
                                    placeholder="Tên sản phẩm" />
                            </div>
                        </div>
                        <div class="form-group row pb-0 p-2">
                            <label class="col-md-2 col-form-label">Giá Bán (vnđ):</label>
                            <div class="col-md-2">
                                <input id="input_Price" name="price" class="form-control" type="text" value=""
                                    placeholder="Giá bán" />
                            </div>
                        </div>

                        <div class="form-group row p-2">
                            <label class="col-md-2 col-form-label">Hình Ảnh:</label>
                            <div class="col-md-10">
                                <a id="a_Avatar" href="../admin/images/noimage.png" target="_blank"
                                    data-fancybox="gallery" class="fancybox lightbox-preview" rel="group">
                                    <img id="img_Avatar" src="../admin/images/noimage.png" alt="avatar"
                                        class="default-image img-polaroid avatar-preview"
                                        style="width: 200px; height: 180px;" />
                                </a>
                                <input type="file" name="image" ID="FileUpload_Avatar" class="skip"
                                    preview="avatar-preview"></button>
                                <br />
                            </div>
                        </div>
                        <div class="form-group row pb-0 p-2">
                            <label class="col-md-2 col-form-label">Số lượng:</label>
                            <div class="col-md-2">
                                <input id="input_Quantity" name="soluong" class="form-control" type="text" value=""
                                    placeholder="Số Lượng" />
                            </div>
                        </div>

                        <div class="form-group row pb-0 p-2">
                            <label class="col-md-2 col-form-label">Mô Tả:</label>
                            <div class="col-md-10">
                                <textarea name="description" id="textarea_Content" rows="10"
                                    class="form-control tinyeditor"></textarea>
                            </div>
                        </div>
                        <div class="form-group row pb-0 p-2">
                            <label class="col-md-2 form-check-label">Tình Trạng:</label>
                            <div class="col-md-10">
                                <input id="radio_StatusYes" class="form-check-inline" type="radio" checked
                                    name="status" />
                                Hiển Thị
                                <input id="radio_StatusNo" class="ml-5 form-check-inline" type="radio" name="status" />
                                Ẩn
                            </div>
                        </div>
                        <div class="form-group pb-0 p-2 row">
                            <label class="col-md-2 col-form-label">Chức năng:</label>
                            <div class="col-md-10">
                                <select name="type" class="form-control">
                                    <option value="1">Sản phẩm nổi bật</option>
                                    <option value="2">Sản phẩm không nổi bật</option>
                                </select>
                            </div>
                        </div>
                        <hr />
                        <!--Save + Messege-->
                        <div class="form-group row pb-0 p-2">
                            <div class="col-md-2 text-center">
                                <button class="btn btn-success" type="submit" name="submit"><i class="fa fa-save"> Lưu </i></button>
                            </div>
                            <div class="col-md-10">
                            <?php
                                if(isset($insertProduct)){
                                    echo $insertProduct;
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php 
        include '../admin/include/script.php';
        ?>

</form>
</body>

</html>