<?php //
ob_start();
  $social_result=$app_obj->select_social_link();
  $social_result_info=  mysql_fetch_assoc($social_result);
  $select_logo=$app_obj->select_logo();
 $select_logo_info=  mysql_fetch_assoc($select_logo);
 $select_banner=$app_obj->select_banner();
 $select_banner_info=  mysql_fetch_assoc($select_banner);
 
 //$message=$app_obj->logout();


//
//if (isset($_GET['logout'])) {
//    $login_obj->logout();
//}
  //echo '<pre/>';
 //print_r($select_banner_info);
  //exit();
  
  ?>


<div class="social_icon2">  


    <!-- social media icons -->
    <ul >
        
        </li>
        <li><a href="<?php echo $social_result_info['social1_url'];?>"><i class="fa fa-lg fa-facebook"></i></a></li>
        <li><a href="<?php echo $social_result_info['social3_url'];?>"><i class="fa fa-lg fa-twitter"></i></a></li>
        <li><a href="<?php echo $social_result_info['social2_url'];?>"><i class="fa fa-lg fa-google-plus"></i></a></li>
        <li><a href="<?php echo $social_result_info['social4_url'];?>"><i class="fa fa-lg fa-linkedin"></i></a></li>



    </ul>
    

</div>




<div class="row">
    <div class="col-md-3 masthead2">
       <a href='http://localhost/news_project/'> <img src="admin/<?php echo $select_logo_info['image_name']?>" style="max-height: 60px;min-width: 100%; "/>
	   </a>
    </div>
    <div class="col-md-9 masthead hidden-xs hidden-sm">
        <img src="admin/<?php echo $select_banner_info['image_name']?>"/>
    </div>
</div>

