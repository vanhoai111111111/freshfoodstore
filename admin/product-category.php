<?php
include '../admin/classes/category.php';
?>
<?php
$cat = new category();
if(isset($_GET['delid']))
{
    $id=$_GET['delid'];
    $delcat = $cat ->del_category($id);
}
?>
<?php 
include_once '../admin/include/header.php';
?>

<!-- Nội dung -->
<div class="workplace">
    <form action="../product-category/product-category.php" method="POST">
        <div class="breadcrumbs">
            <div class="page-header float-right">
                <div class="page-title">

                    <ol class="breadcrumb text-right">
                        <li><a href="/freshfoodstore/admin">Bảng điều khiển</a></li>
                        <li class="active">Danh sách danh mục </li>
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
                                <a href="../admin/add-product-category.php" title="Thêm Mới"><i
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
                                            $cat = new category();
                                            $show_cate = $cat->show_catergory();
                                            if($show_cate){
                                                $i=0;
                                                while($result=$show_cate->fetch_assoc()){
                                                    $i++;
                                            ?>
                                    <tr>
                                        <td class="align-middle">
                                            <?php echo $i?>
                                        </td>
                                        <td class="align-middle">
                                            <div class="list-group">
                                                <a href="#"
                                                    class="list-group-item list-group-item-action"><?php echo $result['catName']?></a>
                                            </div>

                                            
                                        </td>
                                        <td class="align-middle">
                                                <a href="../admin/edit-product-category.php?catid=<?php echo $result['catId']?>">Sửa</a> ||
                                                <a onclick="return confirm('Bạn có muốn xóa?')" href="?delid=<?php echo $result['catId']?>">Xóa</a>
                                        </td>
                                        <?php 
                                            }
                                                }
                                            ?>
                                    </tr>
                                    <?php
                                if(isset($delcat)){
                                    echo $delcat;
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