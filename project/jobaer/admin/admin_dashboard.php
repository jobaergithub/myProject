<?php
$user=$sup_obj->get_user();
$total_category=$sup_obj->select_all_category_info();
$total_category=mysql_num_rows($total_category);
$comments_count=$sup_obj->get_comment1();
$total_news=$sup_obj->total_news_count();
$count=  mysql_num_rows($user);
$total_comment= mysql_num_rows($comments_count);
$last_5_user=$sup_obj->last_5_user();
$last_10_news=$sup_obj->last_8_news();
$result=$sup_obj->last_week_news();
//$result=  mysql_fetch_assoc($result);
$weekly_news=  mysql_num_rows($result);
$last_week_comment=$sup_obj->last_week_comment();
$last_week_user=$sup_obj->last_week_user();
//echo '<pre/>';
//print_r($data);
//exit();
?>

<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Dashboard</a></li>
</ul>

<div class="row-fluid">	

    <a class="quick-button metro yellow span2">
        <i class="icon-group"></i>
        <p>Users</p>
        <span class="badge"><?php echo $count;?></span>
    </a>
    <a class="quick-button metro red span2">
        <i class="icon-comments-alt"></i>
        <p>Comments</p>
        <span class="badge"><?php echo $total_comment;?></span>
    </a>
    <a class="quick-button metro blue span2">
        <i class="icon-shopping-cart"></i>
        <p>Total Category</p>
        <span class="badge"><?php echo $total_category;?></span>
    </a>

    <a class="quick-button metro pink span2">
        <i class="icon-envelope"></i>
        <p>Total News</p>
        <span class="badge"><?php echo $total_news;?></span>
    </a>
   

    <div class="clearfix"></div>

</div><!--/row-->


