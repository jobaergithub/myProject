<?php
require_once '../classes/super_admin.php';
$sup_obj = new Super_Admin();
$category_id = $_GET['category_id'];
$query_result = $sup_obj->select_category_info_by_category_id($category_id);
$data=mysql_fetch_assoc($query_result);
?>

<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="admin_master.php">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li>
        <i class="icon-th"></i>
        <a href="manage_category.php">Category</a>
        <i class="icon-angle-right"></i>
    </li>
    <li>
        <i class="icon-zoom-out"></i>
        <a href="#">View Category</a></li>
</ul>
<table class="table table-bordered table-striped table-hover" style="width: 60%;" align='center'>
    <tr>
        <th>Category Id</th>
        <td><?php echo $data['category_id'];?></td>
    </tr>
    <tr>
        <th>Category Name</th>
        <td><?php echo $data['category_name'];?></td>
    </tr>
    <tr>
        <th>Category Description</th>
        <td><?php echo $data['category_description'];?></td>
    </tr>
    <tr>
        <th>Publication Status</th>
        <td><?php if($data['publication_status'] == 1) { echo "Published"; } else { echo "Unpublished"; }?></td>
    </tr>
</table>