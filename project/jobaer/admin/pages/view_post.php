<?php
require_once '../classes/super_admin.php';
$sup_obj = new Super_Admin();
$news_id = $_GET['news_id'];
$query_result = $sup_obj->select_news_info_by_news_id($news_id);
$data=mysql_fetch_assoc($query_result);
?>
<table class="table table-bordered table-striped table-hover" style="width: 80%;" align='center'>
    <tr>
        <th>News Id</th>
        <td><?php echo $data['news_id'];?></td>
    </tr>
    <tr>
        <th>News Title</th>
        <td><?php echo $data['news_title'];?></td>
    </tr>
    <tr>
        <th>News Description</th>
        <td><?php echo $data['news_description'];?></td>
    </tr>
    <tr>
        <th>Publication Status</th>
        <td><?php if($data['news_publication_status'] == 1) { echo "Published"; } else { echo "Unpublished"; }?></td>
    </tr>
</table>