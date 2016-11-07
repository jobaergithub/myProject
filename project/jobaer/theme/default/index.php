 <?php
 ob_start();
session_start();
require 'classes/application.php';
include'classes/counter.php';

$app_obj=new Application();


$ad_result=$app_obj->select_tbl_ad();
if (isset($_GET['logout'])) {
    $app_obj->logout();
}
$kar= $app_obj->kar();
$site_url='http://localhost/jobaer/';
?>
<html>
    <head>
        <title>Top Line<?php
      if (basename($_SERVER['SCRIPT_FILENAME'], '.php')=='index') {
          echo ' - Home';
      }else {echo '-'.ucwords(basename($_SERVER['SCRIPT_FILENAME'], '.php'));}

        
        ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link type="text/css" href="theme/default/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="theme/default/css/custom_style.css" rel="stylesheet">
        <link type="text/css" href="theme/default/css/style.css" rel="stylesheet">
        <link rel="stylesheet" href="theme/default/css/ticker.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="theme/default/js/bootstrap.min.js"></script>
        
        


    </head>
    <body>

        
        
        <!--        start container-->

        <div class="container" style="background-color:white;">

         
            
<!--start header-->

<?php 
counter();

include 'header.php';


?>
<h3 style="color:green">
                            <?php
                            if (isset($_SESSION['message'])) {
                                echo $_SESSION['message'];
                                unset($_SESSION['message']);
                            }
                            ?>

                        </h3>

<!--end header-->

            <!--            start nav-->
<?php 
include 'nav_menu.php';
?>

            <!--end nav-->

            <!--            start row-->
            <div class="row top_buffer">
<!--                start home content-->
<div class="col-md-9">
        <?php
    if (isset($page) == NULL) {
        include 'home_content.php';
    }else if($page == 'tk') {
                            include 'login.php';
                        }
    else if($page == 'details') {
                            include 'detail.php';
                        }
                        else if($page == 'category') {
                            include 'category_view.php';
                        }else if($page == 'ta' && isset($_SESSION['user_id'])==false) {

                            include 'user_registration.php';
                        }
                        else if($page == 'tk') {
                            include 'login.php';
                        }else if($page == 'password') {
                            include 'forgot_password.php';
                        }else if($page == 'profile') {
                            include 'user_profile.php';
                        }else if($page == 'update_profile') {
                            include 'user_profile_update.php';
                        }else if($page == 'comment') {
                            include 'user_activity.php';
                        }else if($page == 'profile_pic') {
                            include 'profile_pic.php';
                        }else if($page == 'contact') {
                            include 'contact_form.php';
                        }
                        
                        
                        
    ?>
    </div>
<!--end home content-->

                <div class="col-md-3 nopadding">
                  
                                     <div class="col-md-12">
                                           <div class="row top_buffer">
        
	</div>
	<div class="text_head top_buffer"><strong>Popular News</strong></div>
                <div class="box_style"> 
                            <ul>
                                <?php
                while($row=  mysql_fetch_assoc($kar))
                {
            ?>
            <li><a class="color1" href="details.php?news_id=<?php echo $row['news_id']?>"><?php echo $row['news_title']?></a></li>
                <?php } ?>
                            
                            </ul>
                        </div>
                     <!--<div class="text_head top_buffer">Advertisement</div>
                     <?php
                //while($row=  mysql_fetch_assoc($ad_result))
                //{
            ?>
                     <a class="color1" href="details.php?category_id=<?php //echo $row['ad_id']?>"><img src="admin/<?php //echo $row['ad_image']?>" style="max-width: 100%"></a>
                <?php //} ?>-->
                    </div>
                </div>
            </div>
            <!--end container-->    
<!--start footer-->
<?php 
include 'footer.php';
?>
<!--end footer-->

        </div>


<script src="theme/default/js/ticker.js"></script>
    </body>
</html>
