  <?php
  $all_news_select_result=$app_obj->select_all_news();
  $all_news_select_result1=$app_obj->select_all_news();
  $get_news1=$app_obj->get_news(1);
  $get_news2=$app_obj->get_news(2);
  $get_news3=$app_obj->get_news(3);
  $get_news4=$app_obj->get_news(7);
  $get_news5=$app_obj->get_news(8);
  $get_news6=$app_obj->get_news(9);
  $get_news7=$app_obj->get_news(10);
   $gallery1=$app_obj->get_gallery();
   
  //print_r($gallery);
  
  
  //exit();
  //$get_image_view=$app_obj->get_image_view();
  //$image_view_info=mysql_fetch_assoc($get_image_view);
  $get_image=$app_obj->get_image(1);
  $get_image1=$app_obj->get_image(2);
  $get_image2=$app_obj->get_image(3);
  $get_image3=$app_obj->get_image(7);
  $get_image4=$app_obj->get_image(8);
  $get_image5=$app_obj->get_image(9);

  $image_info=   mysql_fetch_assoc($get_image);
  $image_info1=  mysql_fetch_assoc($get_image1);
  $image_info2=  mysql_fetch_assoc($get_image2);
  $image_info3=  mysql_fetch_assoc($get_image3);
  $image_info4=  mysql_fetch_assoc($get_image4);
  $image_info5=  mysql_fetch_assoc($get_image5);
   // print_r($image_info5);
  
  
  //exit();

//  echo '<pre/>';
//  $row=mysql_fetch_assoc($select_all_news_from_news_id_1_result1);
//  print_r($row);
//  
//  
//  exit();
  $top_news=$app_obj->get_top_news();
  $ad_result1=$app_obj->select_tbl_ad();
  $video=$app_obj->get_video();
 $ad_result1=mysql_fetch_assoc($ad_result1);
?>
<div class="ticker-container">
  <div class="ticker-caption">
    <p>Breaking News</p>
  </div>
  <ul>
   <?php
                while($row10=  mysql_fetch_assoc($top_news))
                {
            ?>
            <div>
      <li><span><?php echo $row10['news_title'];?></span></li>
    </div>
    <?php } ?>
  </ul>
</div>

          <div class="row ">
<!--start sliders-->
<?php 

                            include 'slider.php';
  

?>
<!--end sliders-->
                <div class="col-md-5 nopadding">
                    <div class="text_head">
                        <p>Latest News</p>
                    </div>
                    <div class="tarek123">
                        <ul>
                                            <?php
                while($row=  mysql_fetch_assoc($all_news_select_result))
                {
            ?>
            <li><a class="color1" href="details.php?news_id=<?php echo $row['news_id']; ?>"><?php echo $row['news_title']?></a></li>
                <?php } ?>
                           
                            
                        </ul>
                    </div>
                
                   
                </div>

            </div>

<!--                    start image news-->
            <div class="row top_buffer hidden-sm">
                
                <div class="col-md-4 hidden-xs hidden-sm nopadding">
                    <img src="admin/<?php echo $image_info1['news_image']?>" width="100%" height="150px">
                    <h6><a class="color1" href="details.php?news_id=<?php echo $image_info1['news_id']?>"><?php echo $image_info1['news_title']?></a></h6>
                </div>
				<div class="col-md-4 hidden-xs hidden-sm nopadding">
                    <img src="admin/<?php echo $image_info5['news_image']?>" width="100%" height="150px">
                    <h6><a class="color1" href="details.php?news_id=<?php echo $image_info5['news_id']?>"><?php echo $image_info5['news_title']?></a></h6>
                </div>
                
<div class="col-md-4 hidden-xs hidden-sm nopadding">
                    <img src="admin/<?php echo $image_info4['news_image']?>" width="100%" height="150px">
                    <h6><a class="color1" href="details.php?news_id=<?php echo $image_info4['news_id']?>"><?php echo $image_info4['news_title']?></a></h6>
                </div>				

            </div>
            <div class="row top_buffer hidden-sm">
			<div class="col-md-4 hidden-xs hidden-sm nopadding">
                    <img src="admin/<?php echo $image_info2['news_image']?>" width="100%" height="150px">
                    <h6><a class="color1" href="details.php?news_id=<?php echo $image_info2['news_id']?>"><?php echo $image_info2['news_title']?></a></h6>
                </div>
			
            <div class="col-md-4 hidden-xs hidden-sm nopadding">
                    <img src="admin/<?php echo $image_info3['news_image']?>" width="100%" height="150px">
                    <h6><a class="color1" href="details.php?news_id=<?php echo $image_info3['news_id']?>"><?php echo $image_info3['news_title']?></a></h6>
                </div>
		    
		    
				<div class="col-md-4 hidden-xs hidden-sm nopadding">
                    <img src="admin/<?php echo $image_info['news_image']?>" width="100%" height="150px">
                    <h6><a class="color1" href="details.php?news_id=<?php echo $image_info['news_id']?>"><?php echo $image_info['news_title']?></a></h6>
                </div>
                
                

            </div>
<!--end image news-->
            <div class="row top_buffer">
                <div class="col-md-12">
                    <div class="line1"></div>
                    <p>Top News</p>
                    <div class="line1"></div>
                    <div class="row top_buffer">
                        <div class="col-md-4 nopadding">
                            <div class="text_head"><a href='category.php?category_id=1'>Bangladesh</a></div>

                            <img class="hidden-sm hidden-xs" src="admin/<?php echo $image_info['news_image']?>" width="100%" height="150px">
                        <div class="box_style"> 
                            <ul>
                                <?php
                while($row=  mysql_fetch_assoc($get_news1))
                {
            ?>
            <li><a class="color1" href="details.php?news_id=<?php echo $row['news_id']?>"><?php echo $row['news_title']?></a></li>
                <?php } ?>
                            
                            </ul>
                        </div>
                        </div>
                        <div class="col-md-4 nopadding">
                            <div class="text_head"><a href='category.php?category_id=2'>International</a></div>
                            <img class="hidden-sm hidden-xs" src="admin/<?php echo $image_info1['news_image']?>" width="100%" height="150px">
                        <div class="box_style"> 
                          <ul>
                                <?php
                while($row=  mysql_fetch_assoc($get_news2))
                {
            ?>
            <li><a class="color1" href="details.php?news_id=<?php echo $row['news_id']?>"><?php echo $row['news_title']?></a></li>
                <?php } ?>
                            
                            </ul>
                        </div>
                        </div>
                        <div class="col-md-4 nopadding">
                            <div class="text_head"><a href='category.php?category_id=3'>Sports</a></div>
                            <img class="hidden-sm hidden-xs" src="admin/<?php echo $image_info2['news_image']?>" width="100%" height="150px">
                        <div class="box_style"> 
                            <ul>
                                <?php
                while($row=  mysql_fetch_assoc($get_news3))
                {
            ?>
            <li><a class="color1" href="details.php?news_id=<?php echo $row['news_id']?>"><?php echo $row['news_title']?></a></li>
                <?php } ?>
                            
                            </ul>
                        </div>
                        </div>
                        
                    </div>
                </div>
                
            </div>
<div class="row top_buffer">
    <div class="col-md-4">
        <div class="line1"></div>
        <p>  </p>
        <div class="line1"></div>
                                    <div class="text_head"><a href='category.php?category_id=7'>Entertainment</a></div>
                            <img class="hidden-sm hidden-xs top_buffer" src="admin/<?php echo $image_info3['news_image']?>" width="100%" height="150px">
                        <div class="box_style"> 
                            <ul>
                                <?php
                while($row=  mysql_fetch_assoc($get_news4))
                {
            ?>
            <li><a class="color1" href="details.php?news_id=<?php echo $row['news_id']?>"><?php echo $row['news_title']?></a></li>
                <?php } ?>
                            
                            </ul>
                        </div>
    </div>
    <div class="col-md-4">
                <div class="line1"></div>
        <p>  </p>
        <div class="line1"></div>
                                    <div class="text_head"><a href='category.php?category_id=1'>Science&tech </a></div>
                            <img class="hidden-sm hidden-xs top_buffer" src="admin/<?php echo $image_info4['news_image']?>" width="100%" height="150px">
                        <div class="box_style"> 
                            <ul>
                                <?php
                while($row=  mysql_fetch_assoc($get_news5))
                {
            ?>
            <li><a class="color1" href="details.php?news_id=<?php echo $row['news_id']?>"><?php echo $row['news_title']?></a></li>
                <?php } ?>
                            
                            </ul>
                        </div>
    </div>
    <div class="col-md-4">
                <div class="line1"></div>
        <p>  </p>
        <div class="line1"></div>
                                    <div class="text_head"><a href='category.php?category_id=1'>Lifestyle </a></div>
                            <img class="hidden-sm hidden-xs top_buffer" src="admin/<?php echo $image_info5['news_image']?>" width="100%" height="150px">
                        <div class="box_style"> 
<ul>
                                <?php
                while($row=  mysql_fetch_assoc($get_news6))
                {
            ?>
            <li><a class="color1" href="details.php?news_id=<?php echo $row['news_id']?>"><?php echo $row['news_title']?></a></li>
                <?php } ?>
                            
                            </ul>
                        </div>
    </div>
 
</div>
            
		<div class="line1"></div>
                    <p>Image Gallery</p>
                    <div class="line1"></div>
	<div class="row top_buffer">
	<?php
                while($gallery=mysql_fetch_assoc($gallery1))
                {
            ?>
            <div class="col-md-3 col-sm-4 col-xs-6 top_buffer"><a href='details.php?news_id=<?php echo $gallery['news_id'];?>'><img class="" src="admin/<?php echo $gallery['news_image'];?>" height="113px" width="167px;" /></a></div>
                <?php } ?>
		
    </div>

	
<div class="line1 top_buffer"></div>
                    <p>Video Gallery</p>
                    <div class="line1"></div>
    

    
    <div class="row top_buffer">
      <?php
                while($video1=mysql_fetch_assoc($video))
                {
            ?>
      <div class="col-md-3 col-sm-4 col-xs-6 nopadding top_buffer">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe width="560" height="315" src="//www.youtube.com/embed/<?php echo $video1['video_name'];?>" allowfullscreen></iframe>
        </div>
      </div>
	  <?php } ?>
      
      
    </div>
    
    
                