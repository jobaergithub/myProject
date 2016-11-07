<?php

if (isset($_GET['status'])) {
    if ($_GET['status'] == 'unpublished') {
        $news_id = $_GET['news_id'];
        $message = $sup_obj->unpublished_news_by_news_id($news_id);
    }
    else if ($_GET['status'] == 'published') {
        $news_id = $_GET['news_id'];
        $message = $sup_obj->published_news_by_news_id($news_id);
    }
    else if ($_GET['status'] == 'delete') {
        $news_id = $_GET['news_id'];
        $message = $sup_obj->delete_news_by_news_id($news_id);
    }
    
    
}
if (isset($_GET['mark'])) {
    if ($_GET['mark'] == 'published') {
        $news_id = $_GET['news_id'];
        $message = $sup_obj->top_news($news_id);

    }else if ($_GET['mark'] == 'unpublished') {
        $news_id = $_GET['news_id'];
        $message = $sup_obj->remove_top_news($news_id);
    }
}
$query_result = $sup_obj->select_all_news();
// $data = mysql_fetch_assoc($query_result);
// echo "<pre/>";
// print_r($data);
// exit();
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
                        <th>News Title</th>
                        <th>Status</th>
                        <th>Actions</th>
                        <th>Top News</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php $i = 1;
                    while ($data = mysql_fetch_assoc($query_result)) {
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td class="center"><?php echo $data['news_title']; ?></td>
                            <td class="center">
                                <?php
                                if ($data['news_publication_status'] == 1) {
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
                                <a class="btn btn-info" href="post_view.php?news_id=<?php echo $data['news_id']; ?>" title="View"> 
                                    <i class="halflings-icon white zoom-in"></i>  
                                </a>
    <?php if ($data['news_publication_status'] == 1) { ?>
                                    <a class="btn btn-primary" href="?status=unpublished&news_id=<?php echo $data['news_id']; ?>" title="Unpublished">
                                        <i class="halflings-icon white arrow-down"></i>  
                                    </a>
    <?php } else { ?>
                                    <a class="btn btn-danger" href="?status=published&news_id=<?php echo $data['news_id']; ?>" title="Published">
                                        <i class="halflings-icon white arrow-up"></i>  
                                    </a>
    <?php } ?>
                                <a class="btn btn-success" href="edit_post.php?news_id=<?php echo $data['news_id']; ?>" title="Edit">
                                    <i class="halflings-icon white edit"></i>  
                                </a>
                                <a class="btn btn-danger" href="?status=delete&news_id=<?php echo $data['news_id']; ?>" title="Delete" onclick="return check_delete(); ">
                                    <i class="halflings-icon white trash"></i> 
                                </a>
                            </td>
                            <td class="center">
    <?php if ($data['top_news'] == 1) { ?>
                                    <a class="btn btn-success" href="?mark=unpublished&news_id=<?php echo $data['news_id']; ?>" title="Remove From Top News">
                                        <i class="halflings-icon white remove"></i>  
                                    </a>
    <?php } else { ?>
                                    <a class="btn btn-danger" href="?mark=published&news_id=<?php echo $data['news_id']; ?>" title="Mark as Top News">
                                        <i class="halflings-icon white ok"></i>  
                                    </a>
    <?php } ?>
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