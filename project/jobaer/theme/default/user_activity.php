<?php
//$user_id=$_GET['user_id'];
$user_id2=$_SESSION['user_id'];
    if(isset($_GET['user_id']) && $_GET['user_id']==$_SESSION['user_id']){
		$user_id=$_GET['user_id'];
    
		
	}else{
		header("Location: activity.php?user_id=$user_id2");
	}

    
//$result=$app_obj->get_user_comment($user_id);
$result=$app_obj->all_info($user_id);
//echo $result;
 //$row=  mysql_fetch_assoc($result);
 //echo "<pre/>";
 //print_r($row);
// exit();

$count=mysql_num_rows($result);

// echo $news_id;
// print_r($result);
// exit();
?>

<h3 class="bg-success">Activity Feed</h3>
<h5 style="color:green;">
              <?php
              
	echo "You make $count comment";

?>
</h5>
<ul class="list-group">

  <?php
                while($row=  mysql_fetch_assoc($result))
                {
            ?>
            <li class="list-group-item list-group-item-success">You commented on
			<a href='details.php?news_id=<?php echo $row['news_id']; ?>'><em><?php echo $row['news_title']; ?></em></a>
			<strong>'<?php echo $row['comment_content']; ?>'</strong> at <?php
                $time=$row['create_time'];
                echo date("F j, Y, g:i a", strtotime($time));?></li>
                <?php } ?>
              </ul>
              

