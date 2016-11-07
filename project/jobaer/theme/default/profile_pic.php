<?php
$user_id2=$_SESSION['user_id'];
    if(isset($_GET['user_id']) && $_GET['user_id']==$_SESSION['user_id']){
		if(isset($_POST['btn'])) {
        $message=$app_obj->profile_pic($_POST, $_FILES);
    }
		
	}else{
		header("Location: profile.php?user_id=$user_id2");
	}




?>


<html>
<body>

<form action="" method="post" enctype="multipart/form-data">
    <h3 class="bg-success">Select image to upload:</h3>
    <h3 style="color: green">
                <?php 
                    if(isset($message)){
                        echo $message;
                        unset($message);
                    }
                ?>
                    </h3>
    <div class="control-group">
                        

                        <div class="controls">
                            <input type="file" name="profile_pic" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                        
                        </div>
                    </div> 
   <!--  <input type="file" name="profile_pic"> -->
    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'];?>">
	<input type="hidden" name="uid" value="<?php echo $_SESSION['uid'];?>">
    <br>
    <input class="btn btn-success" type="submit" value="Upload Image" name="btn">
</form>

</body>
</html> 