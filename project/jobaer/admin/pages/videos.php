<?php
    
    require_once '../classes/super_admin.php';
    
    $sup_obj=new Super_Admin();
  $category_result=$sup_obj->select_all_published_category();
    if(isset($_POST['btn'])) {
        $message=$sup_obj->save_video($_POST);
    }
?>
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.php">Home</a>
        <i class="icon-angle-right"></i> 
    </li>
    <li>
        <i class="icon-edit"></i>
        <a href="#">Forms</a>
    </li>
</ul>
<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Form Elements</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                <h3 style="color: green">
                <?php 
                    if(isset($message)){
                        echo $message;
                        unset($message);
                    }
                ?>
                    </h3>
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">News Title</label>
                        <div class="controls">
                            <input type="text" name="video_title"  class="span6 typeahead" id="typeahead"  >
                        </div>
                    </div>
                    
                    
                    <input type="hidden" name="admin_id" value="<?php echo $_SESSION['admin_id']; ?>">
                    
                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">News Description</label>
                        <div class="controls">
                            <textarea class="cleditor" name="video_description" id="textarea2" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Youtube Video Id</label>
                        <div class="controls">
                            <input type="text" name="video_name" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                        </div>
                    </div>
                    
                    
                   
                    <div class="form-actions">
<!--                        <button type="submit" name="btn" class="btn btn-primary">Save Category</button>
                        <button type="reset" class="btn">Reset</button>-->
<button type="submit" name="btn" class="btn btn-primary" onclick="">Save Category</button>
<button></button>
                    </div>
                </fieldset>
            </form> 
        </div>
    </div><!--/span-->
</div><!--/row-->