

<?php
$user_id2=$_SESSION['user_id'];
    if(isset($_GET['user_id']) && $_GET['user_id']==$_SESSION['user_id']){
		$user_id=$_GET['user_id'];
		
	}else{
		header("Location: profile.php?user_id=$user_id2");
	}

$uid=$_SESSION['uid'];

    
    $result=$app_obj->get_user($user_id,$uid);



$result=mysql_fetch_assoc($result);


    
    //$confirm_code=md5(uniqid(rand()));
    if(isset($_POST['btn'])) {
        $message=$app_obj->profile_update($_POST);
        
    }

    $date=date("Y-m-d");
    $date=date("Y-m-d",strtotime($date));
   
?>
<h1 class="well"><?php echo $result['user_first_name'];?>'s Profile</h1>

<h3 style="color: green">
                <?php 
                    if(isset($message)){
                        echo $message;
                        unset($message);
                    }
                ?>
                    </h3>
<div class="col-lg-12 well">
    <div class="row">
        <h3 class="text-success">
            <?php if(isset($message)) {echo $message;unset($message);}?>
        </h3>
        <form action="" method="post">
            <div class="col-sm-12">
                
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" value="<?php echo $result['user_first_name'];?>" class="form-control" name="user_first_name" />
                        <input type="hidden" name="user_id" value="<?php echo $user_id;?>"/>
                    </div>
                    					
                <div class="form-group">
                    <label>Address</label>
                    <textarea rows="3" class="form-control" name="user_address"><?php echo $result['user_address'];?></textarea>
                </div>	
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label>Country</label>
                        <input type="text" value="<?php echo $result['user_country'];?>" class="form-control" name="user_country" />
                    </div>	
                    <div class="col-sm-6 form-group">
                        <label>Gender</label>

                        <div class="controls">
                            
                            <input type="radio" name="user_gender" value="1" checked>Male
                            <input type="radio" name="user_gender" value="2" > Female
                        </div>
                    </div>	

                </div>
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label>Username</label>
                        <input type="text" value="<?php echo $result['user_name'];?>" class="form-control" name="user_name" >
                    </div>		
                    <div class="col-sm-6 form-group">
                        <label>Password</label>
                        <input type="password" placeholder="Enter Company Name Here.." class="form-control" name="user_password" >
                    </div>	
                </div>						

                <div class="form-group">
                    <label>Email Address</label>
                    <input type="text" value="<?php echo $result['user_email'];?>" class="form-control" name="user_email" required="required">
                </div>	

                <button type="submit" name="btn" class="btn btn-lg btn-info">Update</button>					
            </div>
        </form> 
    </div>
</div>

