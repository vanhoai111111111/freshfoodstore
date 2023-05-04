<?php 
include_once '../admin/include/header.php';
?>
<?php include_once '../admin/classes/category.php';?>
<?php include_once '../admin/classes/brand.php';?>
<?php include_once '../admin/classes/product.php';?>
<?php include_once '../helper/format.php';?>
<?php
$pd = new product();
$fm = new Format();
if(isset($_GET['productid']))
{
    $id=$_GET['productid'];
    $delpro = $pd ->del_product($id);
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
                    <form asp-action="Index" method="get">
                        <div class="form-group row pb-0 p-2 border-secondary">
                            <div class="col-md-5">
                                <select name="categoryId"
                                    class="form-control">
                                    <option>--Chọn danh mục--</option>
                                </select>
                            </div>
                            <div class="col-md-5 text-center">
                                <div class="row">
                                    <input type="text"  name="keyword"
                                        class="form-control input-search" />
                                    <div class="cold-md-3">
                                        <button type="submit" class="btn btn-primary">Tìm</button>
                                        <button type="button" onclick="window.location.href='/Product/Index'"
                                            class="btn btn-dark">Reset</button>
                                    </div>
                                </div>
                                <!-- <input id="input_Keyword" class="form-control input-search" type="text"
                                    placeholder="Tìm kiếm ....." />
                                <a ID="LinkButton_Search" class="btn btn-success input-search-a">
                                    <i class="fa fa-search"></i>&nbsp;
                                </a> -->
                            </div>
                        </div>
                    </form>
                    
                    <div id="msgAlert" class="alert alert-success" role="alert">
                       
                    </div>
                   
                    <table class="table table-striped table-bordered pt-2 text-center">
                        <thead class="table-success">
                            <tr>
                                <th width="160" scope="col" class="align-middle">Mã sản phẩm</th>
                                <th width="120" class="align-middle">Tên sản phẩm</th>
                                <th width="200" scope="col" class="align-middle">Danh mục</th>
                                <th width="200" scope="col" class="align-middle">Thương hiệu</th>
                                <th width="200" scope="col" class="align-middle">Giá</th>
                                <th width="200" scope="col" class="align-middle">Hình ảnh</th>
                                <th width="200" scope="col" class="align-middle">Mô tả</th>
                                <th width="200" scope="col" class="align-middle">Loại</th>
                                <th width="200" scope="col" class="align-middle">Số Lượng</th>
                                <th width="200" scope="col" class="align-middle">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>                         
                            <tr>
                            <?php
                            
                            $pdlist =  $pd->show_product();
                            if($pdlist){
                                $i=0;
                                while($result = $pdlist->fetch_assoc()){
                                $i++;                               
                            ?>
                                <td class="align-middle">
                                    <?php echo $i?>
                                </td>
                                <td class="align-middle">
                                    <?php echo $result['productName']?>
                                </td>
                                <td class="align-middle">
                                    <?php echo $result['catName']?>
                                </td>
                                <td class="align-middle">
                                    <?php echo $result['brandName']?>
                                </td>
                                <td class="align-middle">
                                    <?php echo $result['price']?>
                                </td>
                                <td class="align-middle">
                                    <img src="uploads/<?php echo $result['image']?>" width="80">
                                </td>
                                <td class="align-middle">
                                    <?php echo $fm->textShorten($result['description'],50)?>
                                </td>
                                <td class="align-middle">
                                    <?php if($result['type']==1){
                                        echo 'Sản phẩm nổi bật';
                                    }else{
                                        echo 'Sản phẩm không nổi bật';
                                    }
                                        ?>
                                </td>
                                <td class="align-middle">
                                    <?php echo $result['soluong']?>
                                </td>
                                <td class="align-middle">
                                    <!--<button type="button" class="btn btn-success btn-group-sm "><i class="fa fa-check"></i></button>-->                         
                                    <a href="edit-product.php?productid=<?php echo $result['productId'] ?>" title="Chỉnh sửa"
                                        class="btn btn-info btn-group-sm "><i class="fa fa-pencil"></i></a>
                                    <!--<button type="button" title="Chỉnh sửa" class="btn btn-info btn-group-sm"><i class="fa fa-pencil"></i></button>-->                                    
                                            <a class="btn btn-danger btn-group-sm" onclick="return confirm('Bạn có muốn xóa?')" href="?productid=<?php echo $result['productId'] ?>"><i
                                            class="fa fa-trash-o "></i></a>

                                </td>
                            </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>                       
                    </table>
                    <?php
                                if(isset($delpro)){
                                    echo $delpro;
                                }
                                ?>
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