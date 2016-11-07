<?php



if (isset($_GET['news_id'])) {
    $news_id = $_GET['news_id'];;
}else{
    header('Location:index.php');
}
if (isset($_SESSION['user_id'])) {
    $user_id=$_SESSION['user_id'];
}

//echo $user_id;
//print_r($data4);
//exit();
//$goo=new GoogleRecaptcha();
//$goo->VerifyCaptcha($response);
$result = $app_obj->select_all_news_from_news_id($news_id);
$result2 = $app_obj->select_all_news_from_news($news_id);
$data=mysql_fetch_assoc($result);
$category_id=$data['category_id'];
$select_all_news_from_news_id_1= $app_obj->get_news($category_id);
$admin_id=$data['admin_id'];
$admin_result= $app_obj->select_tbl_admin($admin_id);
$data3=mysql_fetch_assoc($admin_result);
$a=$app_obj->curPageURL();
if(isset($_POST['btn'])) {
        $message=$app_obj->save_comment($_POST,$news_id,$user_id);
    }
    //$comment_result= $app_obj->select_tbl_comment($news_id);
	$comment_result= $app_obj->get_user_com($news_id);
//    $data4=mysql_fetch_assoc($comment_result);
    
//    $g=$app_obj->save_comment($_POST,$news_id);
// echo '<pre/>';
// print_r($data4);
// exit();
$kar= $app_obj->kar();
?>


<!--<img class="img-responsive" src="admin/<?php echo $data2['news_image'];?>" alt="">-->

<div class="row top_buffer">
<!--    
                 Blog Sidebar Widgets Column -->
            <div class="col-md-3">


<!--
                 Blog Categories Well -->
				 <div class="text_head">Popular News</div>
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

                 

            </div>
<!--==========================-->
            <!-- Blog Post Content Column -->
            <div class="col-lg-9">
		<!--	<div class="row">
        <hr class="hr-primary" />
        <ol class="breadcrumb bread-primary ">
          
            <li><a href="#">Home</a></li>
            <li><a href="#">WORLD</a></li>
            <li class="active">LOCAL</li>
            <li class="active">US</li>
        </ol>
    </div>-->

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $data['news_title'];?></h1>

                <hr>

                <!-- Date/Time -->
                <p><span><?php echo $data3['admin_name'];?> | Update: </span><?php
                $time=$data['news_date'];
                echo date("F j, Y, g:i a", strtotime($time));?></p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="admin/<?php echo $data['news_image'];?>" alt="">

                <hr>

                <!-- Post Content -->
               
                
                <p><?php
                    echo $data['news_description'];
                    
                    ?></p>

                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <?php
                $b='<div class="well">
                    <h4>Leave a Comment:</h4>
                    <form class="form-horizontal" action="" method="post">
                    
                        <div class="form-group">
                            <textarea class="form-control" name="comment_content"  rows="3"></textarea>
                            <input type="hidden" value="1" name="parent">
                            <input type="hidden" value="<?php echo $news_id;?>" name="news_id">
                            <input type="hidden" value="<?php echo $user_id;?>" name="user_id">
                        </div>
                        
                        <button type="submit" name="btn" class="btn btn-primary">Submit</button>
                    </form>
                </div>';
                $user_id = isset($_SESSION['user_id']);
                 if ($user_id != NULL) {
                      echo $b;
                      
                 }  else {
                     echo'Please <a href="http://localhost/news_project/login1.php">login</a> to comment';
                 }
                ?>
                <p><?php $k=  mysql_num_rows($comment_result);
                        echo $k.' '; ?>comments</p>

<!--<div class="well">
                    <h4>Leave a Comment:</h4>
                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group">
                            <textarea class="form-control" name="comment_content"  rows="3"></textarea>
                            <input type="hidden" value="1" name="parent">
                            <input type="hidden" value="<?php echo $news_id;?>" name="news_id">
                        </div>
                        <button type="submit" name="btn" class="btn btn-primary">Submit</button>
                    </form>
                </div>-->

                <hr>


                <!-- Posted Comments -->

                <!-- Comment -->
              <?php
                while($data4=mysql_fetch_assoc($comment_result))
                {
            ?>
               <div class="media">
                    <a class="pull-left" href="#">
                        <img alt="User Pic" src="<?php echo $data4['profile_pic'];?>" class="media-object" style="height:64px;width:64px;">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="profile.php?user_id=<?php echo $data4['user_id'];?>"><?php echo $data4['user_name'];?></a>
                            <small><?php
                $time=$data4['create_time'];
                echo date("F j, Y, g:i a", strtotime($time));?></small>
                        </h4>
                        
                        <?php
                        
                        echo $data4['comment_content'];?>
                    </div>
                </div>
                <?php } ?>

                 
<h4 class="bg-success">Related News</h4>
<hr>
            <div class="row">
                
                                                        <?php
                                                        
    

                while($row=  mysql_fetch_assoc($select_all_news_from_news_id_1))
                {
            ?>
                <div class="col-md-6">
                    <div class="media">
                    <a class="pull-left" href="details.php?news_id=<?php echo $row['news_id']?>">
                        <img src="admin/<?php echo $row['news_image'];?>" alt="" height="70" width="70">
                    </a>
                    <div class="media-body">
                        <h5 class="media-heading">

                        </h5>
                        

<!--                        <a class="color1" href="details.php?news_id=<?php //echo $row['category_id']?>"><?php //echo $row['category_name']?></a>-->
                
                        <?php
                       
                $x=$row['news_description'];
                $z=$row['news_id'];
                $y="<a href='details.php?news_id=$z'>read more<a/>";
                echo substr($x, 0, 40).' '.$y;
               
                
                ?>
                    </div>
                </div>
                </div>
                <?php } 
                //header('Location:$a');
               ?>
                
            </div>
            </div>




        </div>
		<script>
function showEmail(){
 var getEmail = document.getElementById('email').value;

 
    document.getElementById('show').innerHTML = getEmail;
  
}

</script>

    

