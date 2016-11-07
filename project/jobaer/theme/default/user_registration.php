<?php
    $app=new Db_Connect();
    
    //$confirm_code=md5(uniqid(rand()));
    if(isset($_POST['btn'])) {
        $message=$app_obj->save_user($_POST);
        
    }

    $date=date("Y-m-d");
    $date=date("Y-m-d",strtotime($date));
   
?>
<h1 class="well">Registration Form</h1>


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
                        <input type="text" placeholder="Enter First Name Here.." class="form-control" name="user_first_name" required="required"/>
                        <input type="hidden" name="join_date" value="<?php echo $date;?>"/>
                    </div>
                    					
                <div class="form-group">
                    <label>Address</label>
                    <textarea placeholder="Enter Address Here.." rows="3" class="form-control" name="user_address"></textarea>
                </div>	
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <label>Country</label>
                        <input type="text" placeholder="Enter City Name Here.." class="form-control" name="user_country" required="required"/>
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
                        <input type="text" placeholder="Enter Designation Here.." class="form-control" name="user_name" required="required">
                    </div>		
                    <div class="col-sm-6 form-group">
                        <label>Password</label>
                        <input type="password" placeholder="Enter Company Name Here.." class="form-control" name="user_password" required="required">
                    </div>	
                </div>						

                <div class="form-group">
                    <label>Email Address</label>
                    <input type="text" placeholder="Enter Email Address Here.." class="form-control" name="user_email" required="required">
                </div>	

                <button type="submit" name="btn" class="btn btn-lg btn-info">Submit</button>					
            </div>
        </form> 
    </div>
</div>

