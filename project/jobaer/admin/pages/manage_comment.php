<?php

if (isset($_GET['status'])) {
    if ($_GET['status'] == 'unpublished') {
        $comment_id = $_GET['comment_id'];
        $message = $sup_obj->disapprove_comment($comment_id);
    }
    else if ($_GET['status'] == 'published') {
        $comment_id = $_GET['comment_id'];
        $message = $sup_obj->approve_comment($comment_id);
    }
    else if ($_GET['status'] == 'delete') {
        $comment_id = $_GET['comment_id'];
        $message = $sup_obj->delete_comment($comment_id);
    }
    
}
$query_result = $sup_obj->get_comment();
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
    if (isset($message) )
    {
        echo $message;
        unset ($message);
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
                        <th>Comment Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php $i = 1;
                    while ($data = mysql_fetch_assoc($query_result)) {
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td class="center"><?php echo $data['comment_content']; ?></td>
                            <td class="center">
                                <?php
                                if ($data['publish_status'] == 1) {
                                    echo '<span class="label label-success">
                                                published
                                            </span>';
                                } else {
                                    echo '<span class="label label-warning">
                                                unpublished
                                            </span>';
                                }
                                ?>
                            </td>
                            <td class="center">
                                
    <?php if ($data['publish_status'] == 1) { ?>
                                    <a class="btn btn-primary" href="?status=unpublished&comment_id=<?php echo $data['comment_id']; ?>" title="Unpublished">
                                        <i class="halflings-icon white arrow-down"></i>  
                                    </a>
    <?php } else { ?>
                                    <a class="btn btn-danger" href="?status=published&comment_id=<?php echo $data['comment_id']; ?>" title="Published">
                                        <i class="halflings-icon white arrow-up"></i>  
                                    </a>
    <?php } ?>
                                <a class="btn btn-success" href="edit_comment.php?comment_id=<?php echo $data['comment_id']; ?>" title="Edit">
                                    <i class="halflings-icon white edit"></i>  
                                </a>
                                <a class="btn btn-danger" href="?status=delete&comment_id=<?php echo $data['comment_id']; ?>" title="Delete" onclick="return check_delete(); ">
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