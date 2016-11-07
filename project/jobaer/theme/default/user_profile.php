<?php
if(isset($_GET['user_id']) && isset($_SESSION['uid'])){
$user_id=$_GET['user_id'];
$uid=$_SESSION['uid'];
 
}else{
	header('location: index.php');
}

    
    $result=$app_obj->get_user1($user_id);



$result=mysql_fetch_assoc($result);
?>

      <div class="row">
              <div class="col-md-12" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $result['user_name'];?></h3>
              
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="<?php echo $result['profile_pic'];?>" class="img-circle img-responsive"> </div>
                
                <div class=" col-md-9 col-lg-9 "> 
                    <table table-responsive>
                  <table class="table table-user-information">
                    <tbody>
                     
                      <tr>
                        <td>User-level</td>
                        <td>User</td>
                      </tr>
                      <tr>
                        <td>Date of Join</td>
                        <td><?php echo $result['join_date'];?></td>
                      </tr>
                   
                         
                             <tr>
                        <td>Gender</td>
                        <td><?php 
                           if ($result['user_gender']==1) {
                               echo 'Male';
                           }else{
                            echo "Female";
                           }
                        ?></td>
                      </tr>
                        <tr>
                        <td>Address</td>
                        <td><?php echo $result['user_address'];?></td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><a href="mailto:<?php echo $result['user_email'];?>"><?php echo $result['user_email'];?></a></td>
                      </tr>
                       
                           
                      </tr>
                     
                    </tbody>
                  </table>
              </table>

                </div>
              </div>
            </div>

            
          </div>
        </div>


      </div>

	     
		

	
	
	<?php
	if(isset($_SESSION['user_id'])){
		$user_id2=$_SESSION['user_id'];
	}
                           
                            if(isset($_GET['user_id']) && isset($_SESSION['user_id']) && $_GET['user_id']==$_SESSION['user_id']) {
                        ?>
                         <a href="update_profile.php?user_id=<?php echo $user_id;?>&&uid=<?php echo $uid;?>" class="btn btn-info" role="button">Edit Profile</a>
<a href="profile_pic_change.php?user_id=<?php echo $user_id;?>&&uid=<?php echo $uid;?>" class="btn btn-info" role="button">Change Profile Picture</a>

                            <?php } ?>
	  

