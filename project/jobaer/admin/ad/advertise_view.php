<?php
require_once '../classes/super_admin.php';
$sup_obj = new Super_Admin();
$ad_id = $_GET['ad_id'];
$query_result = $sup_obj->select_ad_info_by_ad_id($ad_id);
$data=mysql_fetch_assoc($query_result);

//    echo '<pre>';
//     $product_image=$data['ad_image'];
//     echo $product_image;
//print_r($data);
//     exit();
?>
<table class="table table-bordered table-striped table-hover" style="width: 60%;" align='center'>
    <tr>
        <th>Category Id</th>
        <td><?php echo $data['ad_id'];?></td>
    </tr>
    <tr>
        <th>Category Name</th>
        <td><?php echo $data['ad_title'];?></td>
    </tr>
        <tr>
        <th>Image</th>
        <td><img src="<?php echo $data['ad_image'];?>" class="img-responsive" alt="gfg" width="100" height="100"/></td>

    </tr>
    <tr>
        <th>Category Description</th>
        <td><?php echo $data['ad_description'];?></td>
    </tr>
    <tr>
        <th>Publication Status</th>
        <td><?php if($data['ad_publication_status'] == 1) { echo "Published"; } else { echo "Unpublished"; }?></td>
    </tr>
</table>

            
            