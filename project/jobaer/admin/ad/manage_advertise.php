<?php

if (isset($_GET['status'])) {
    if ($_GET['status'] == 'unpublished') {
        $ad_id = $_GET['ad_id'];
        $message = $sup_obj->unpublished_ad_by_ad_id($ad_id);
    }
    else if ($_GET['status'] == 'published') {
        $ad_id = $_GET['ad_id'];
        $message = $sup_obj->published_ad_by_ad_id($ad_id);
    }
    else if ($_GET['status'] == 'delete') {
        $ad_id = $_GET['ad_id'];
        $message = $sup_obj->delete_ad_by_ad_id($ad_id);
    }
    
}
$query_result = $sup_obj->select_all_ad_info();
?>
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Tables</a></li>
</ul>
<h2 style="color: #0000cc;">
    <?php
    if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
    ?>
</h2>
<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>

            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>Serial No</th>
                        <th>Ad Title</th>
                        <th>Publication Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php $i = 1;
                    while ($data = mysql_fetch_assoc($query_result)) {
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td class="center"><?php echo $data['ad_title']; ?></td>
                            <td class="center">
                                <?php
                                if ($data['ad_publication_status'] == 1) {
                                    echo 'Published';
                                } else {
                                    echo 'Unpublished';
                                }
                                ?>
                            </td>
                            <td class="center">
                                <a class="btn btn-info" href="ad_view.php?ad_id=<?php echo $data['ad_id']; ?>" title="View"> 
                                    <i class="halflings-icon white zoom-in"></i>  
                                </a>
    <?php if ($data['ad_publication_status'] == 1) { ?>
                                    <a class="btn btn-primary" href="?status=unpublished&ad_id=<?php echo $data['ad_id']; ?>" title="Unpublished">
                                        <i class="halflings-icon white arrow-down"></i>  
                                    </a>
    <?php } else { ?>
                                    <a class="btn btn-danger" href="?status=published&ad_id=<?php echo $data['ad_id']; ?>" title="Published">
                                        <i class="halflings-icon white arrow-up"></i>  
                                    </a>
    <?php } ?>
                                <a class="btn btn-success" href="edit_ad.php?ad_id=<?php echo $data['ad_id']; ?>" title="Edit">
                                    <i class="halflings-icon white edit"></i>  
                                </a>
                                <a class="btn btn-danger" href="?status=delete&ad_id=<?php echo $data['ad_id']; ?>" title="Delete" onclick="return check_delete(); ">
                                    <i class="halflings-icon white trash"></i> 
                                </a>
                            </td>
                        </tr>
                        <?php $i++;
                    }
                    ?>
                </tbody>
            </table>            
        </div>
    </div>
</div>