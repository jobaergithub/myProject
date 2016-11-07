<?php



if (isset($_GET['category_id'])) {
    $category_id = $_GET['category_id'];;
}else{
    header('Location:index.php');
}

//$select_all_news_from_news_id_1= $app_obj->select_all_news_from_news_id_5($category_id);
$select_all_news_from_news_id_3= $app_obj->select_all_news_from_news_id_5($category_id);
//$data=mysql_fetch_assoc($select_all_news_from_news_id_1);
$category_result=$app_obj->select_all_category($category_id);
$data2=mysql_fetch_assoc($category_result);

// $news_id = $data['news_id'];

?>


  <?php
  // $all_news_select_result=$app_obj->select_all_news();
  // $all_news_select_result1=$app_obj->select_all_news();
  // $select_all_news_from_news_id_1_result1=$app_obj->get_news(1);
  // $select_all_image_by_news_id_result=$app_obj->get_image(1);
  // $image_info=  mysql_fetch_assoc($select_all_image_by_news_id_result);

  $category_news= $app_obj->get_child_category_news($category_id);
  //$category_news=mysql_fetch_assoc($category_news);
  //echo "<pre/>";
  //print_r($category_news);
  //exit();

  
 
?>
          <div class="row ">
<!--start sliders-->
<?php 
include 'category_slider.php';
?>
<!--end sliders-->
                <div class="col-md-5 nopadding">
                    <div class="text_head">
                        <p>Latest News From <?php echo $data2['category_name'];?></p>
                    </div>
                    <div class="tarek123">
                        <ul>
                                            <?php
                while($row=  mysql_fetch_assoc($select_all_news_from_news_id_3))
                {
            ?>
            <li><a class="color1" href="details.php?news_id=<?php echo $row['news_id']; ?>"><?php echo $row['news_title']?></a></li>
                <?php } ?>
                            
                            
                        </ul>
                    </div>
                
                   
                </div>

            </div>
<!--                    start image news-->
        <div class="line1"></div>
                    <h3>All News From <?php echo $data2['category_name'];?></h3>
                    <div class="line1"></div>
            <div class="row top_buffer hidden-sm ">
                <?php
                while($row=  mysql_fetch_assoc($category_news))
                {
            ?>
            <div class="col-md-3 col-sm-4 col-xs-6 top_buffer remove">
                    <img src="admin/<?php echo $row['news_image'];?>" height="113px" width="167px;">
                    <h6><a href='details.php?news_id=<?php echo $row['news_id'];?>'><?php echo $row['news_title'];?></a></h6>
                </div>
                <?php } ?>
                
               

            </div>
