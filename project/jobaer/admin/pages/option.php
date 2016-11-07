             <?php
    
    require_once '../classes/super_admin.php';
    
    $sup_obj=new Super_Admin();

//    echo '<pre/>';
//    print_r($social_info);
//    exit();
  
    if(isset($_POST['btn_logo'])) {
        $message=$sup_obj->update_logo($_POST, $_FILES);
    }
    if(isset($_POST['btn_banner'])) {
        $message=$sup_obj->update_banner($_POST, $_FILES);
    }

        $social_result=$sup_obj->select_social_link();
    $social_info=  mysql_fetch_assoc($social_result);
//        echo '<pre/>';
//    print_r($social_info);
    
    if(isset($_POST['btn_social'])) {
        $message=$sup_obj->update_social_link($_POST);
    }
	if(isset($_POST['btn_footer'])) {
        $message=$sup_obj->footer_copyright($_POST);
    }

?>

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                 <h3 style="color: green">
                <?php 
                    if(isset($message)){
                        echo $message;
                        unset($message);
                    }
                ?>
                    </h3>
<div class="control-group">
<h3>Logo</h3>
                        <label class="control-label" for="typeahead">Logo(262*65 pixel) </label>
                        <br>
                        <div class="controls">
                            <input type="file" name="image_name" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                        
                        </div>
                        <br>
                         <button type="submit" name="btn_logo" class="btn btn-primary">Save</button>
                    </div> 
             </form>
<br>
<br>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
    <h3 style="color: green">
                <?php 
                    if(isset($message)){
                        echo $message;
                        unset($message);
                    }
                ?>
                    </h3>
					<h3>Banner</h3>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">banner(787*65 pixel) </label>
                        <br>
                        <div class="controls">
                            <input type="file" name="image_name" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                        
                        </div>
                        <br>
                         <button type="submit" name="btn_banner" class="btn btn-primary">Save</button>
                    </div> 
</form>

<form class="form-horizontal" action="" method="post">
    <h2>Social link</h2>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Facebook Page URL</label>
                            <div class="controls">
                                <textarea name="social1_url"><?php echo $social_info['social1_url']; ?></textarea>
<!--                                <input type="hidden" name="image_id" value="<?php echo $social_info['image_id']; ?>">-->
                            </div>
                    </div>  
                        
                        <br>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Instagram URL</label>
                            <div class="controls">
                                <textarea name="social2_url"><?php echo $social_info['social2_url']; ?></textarea>
<!--                                <input type="hidden" name="image_id" value="<?php echo $social_info['image_id']; ?>">-->
                            </div>
                    </div>  
                        <br>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Google PlusURL</label>
                            <div class="controls">
                                <textarea name="social3_url"><?php echo $social_info['social3_url']; ?></textarea>
<!--                                <input type="hidden" name="image_id" value="<?php echo $social_info['image_id']; ?>">-->
                            </div>
                    </div>  
                        <br>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Twitter URL</label>
                            <div class="controls">
                                <textarea name="social4_url"><?php echo $social_info['social4_url']; ?></textarea>
<!--                                <input type="hidden" name="image_id" value="<?php echo $social_info['image_id']; ?>">-->
                            </div>
                    </div>  
                        <br>
                        
                         <button type="submit" name="btn_social" class="btn btn-primary">Save</button>
                    
</form>
<h3>Footer Info</h3>
<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
    <h3 style="color: green">
                <?php 
                    if(isset($message)){
                        echo $message;
                        unset($message);
                    }
                ?>
                    </h3>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">banner(787*65 pixel) </label>
                        <br>
                        <div class="controls">
                            <input type="" name="ad_description" class="span6 typeahead">
                        
                        </div>
                        <br>
                         <button type="submit" name="btn_footer" class="btn btn-primary">Save</button>
                    </div> 
</form>