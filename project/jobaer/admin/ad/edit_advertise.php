<?php
    $ad_id=$_GET['ad_id'];
    $query_result=$sup_obj->select_ad_info_by_ad_id($ad_id);
    //echo $query_result;
    $ad_info=mysql_fetch_assoc($query_result);
//    echo '<pre>';
//    print_r($category_info);
//    exit();
    if(isset($_POST['btn'])) {
        $message=$sup_obj->update_ad_info_by_id($_POST, $_FILES);
    }
    
?>
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Home</a>
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
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Advertise Info</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <form name="edit_category_form" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
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
                        <label class="control-label" for="typeahead"> Advertise Title </label>
                        <div class="controls">
                            <input type="text" name="ad_title"  value="<?php echo $ad_info['ad_title']; ?>" class="span6 typeahead" id="typeahead"  >
                            <input type="hidden" name="ad_id"  value="<?php echo $ad_info['ad_id']; ?>" class="span6 typeahead" id="typeahead"  >
                        </div>
                    </div>         
                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Ad Description</label>
                        <div class="controls">
                            <textarea class="cleditor" name="ad_description" id="textarea2" rows="3"><?php echo $ad_info['ad_description']; ?></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">ad Image </label>
                        <div class="controls">
                            <input type="file" name="ad_image" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
                        
                        </div>
                    </div>                    
                    <div class="control-group">
                        <label class="control-label" for="selectError3">Publication Status</label>
                        <div class="controls">
                            <select id="selectError3" name="ad_publication_status">
                                <option>Select Publication Status</option>
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" name="btn" class="btn btn-primary">Update</button>
                        <button type="reset" class="btn">Reset</button>
                    </div>
                </fieldset>
            </form>   
        </div>
    </div><!--/span-->
</div>
<script>
    document.forms['edit_category_form'].elements['ad_publication_status'].value='<?php echo $ad_info['ad_publication_status']; ?>';
</script>







