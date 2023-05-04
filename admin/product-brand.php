<?php
include_once '../admin/classes/brand.php';
?>
<?php
$brand = new brand();
if(isset($_GET['delid']))
{
    $id=$_GET['delid'];
    $delbrand = $brand ->del_brand($id);
}
?>
<?php 
include_once '../admin/include/header.php';
?>

<!-- Nội dung -->
<div class="workplace">
    <form action="product-brand.php" method="POST">
        <div class="breadcrumbs">
            <div class="page-header float-right">
                <div class="page-title">

                    <ol class="breadcrumb text-right">
                        <li><a href="/freshfoodstore/admin">Bảng điều khiển</a></li>
                        <li class="active">Danh sách thương hiệu </li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- Nội dung -->
        <div class="workplace">
            <!-- detail -->
            <div class="row pt-2">
                <!-- list -->
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Danh sách danh mục</h3>
                            <span class="panel-controls">
                                <a href="add-product-brand.php" title="Thêm Mới"><i
                                        class="fa fa-plus"></i></a>
                            </span>
                        </div>
                        <div class="panel-content">
                            <div id="msgAlert" class="alert alert-success" role="alert">
                            </div>
                     
                            <table class="table table-striped table-bordered pt-2 text-center">
                                <thead class="table-success">
                                    <tr>
                                        <th width="160" scope="col" class="align-middle">ID</th>
                                        <th width="200" scope="col" class="align-middle">Tên danh mục</th>
                                        <th width="200" scope="col" class="align-middle">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                          
                                            $show_brand = $brand->show_brand();
                                            if($show_brand){
                                                $i=0;
                                                while($result=$show_brand->fetch_assoc()){
                                                    $i++;
                                            ?>
                                    <tr>
                                        <td class="align-middle">
                                            <?php echo $i?>
                                        </td>
                                        <td class="align-middle">
                                            <div class="list-group">
                                                <a href="#"
                                                    class="list-group-item list-group-item-action"><?php echo $result['brandName']?></a>
                                            </div>

                                            
                                        </td>
                                        <td class="align-middle">
                                                <a href="edit-product-brand.php?brandid=<?php echo $result['brandId']?>">Sửa</a> ||
                                                <a onclick="return confirm('Bạn có muốn xóa?')" href="?delid=<?php echo $result['brandId']?>">Xóa</a>
                                        </td>
                                        <?php 
                                            }
                                                }
                                            ?>
                                    </tr>
                                    <?php
                                if(isset($delbrand)){
                                    echo $delbrand;
                                }
                                ?>
                                </tbody>
                            </table>
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
include_once '../admin/include/script.php';
?>
</form>
</body>

</html>