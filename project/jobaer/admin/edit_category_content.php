<?php
    $category_id=$_GET['category_id'];
    $query_result=$sup_obj->select_category_info_by_category_id($category_id);
    //echo $query_result;
    $category_info=mysql_fetch_assoc($query_result);
//    echo '<pre>';
//    print_r($category_info);
//    exit();
    if(isset($_POST['btn'])) {
        $sup_obj->update_category_info_by_id($_POST);
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
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Form Elements</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <form name="edit_category_form" class="form-horizontal" action="" method="post">
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
                        <label class="control-label" for="typeahead"> Category Name </label>
                        <div class="controls">
                            <input type="text" name="category_name"  value="<?php echo $category_info['category_name']; ?>" class="span6 typeahead" id="typeahead"  >
                            <input type="hidden" name="category_id"  value="<?php echo $category_info['category_id']; ?>" class="span6 typeahead" id="typeahead"  >
                        </div>
                    </div>         
                    <div class="control-group">
                        <label class="control-label" for="selectError3">Category Position</label>
                        <div class="controls">
                            <select id="selectError3" name="position">
                                <option value="">Select Parent Category Position</option>
                                <option value="1">Top</option>
                                <option value="2">Left</option>
                                <option value="3">Right</option>
                                <option value="4">Middle</option>
                                <option value="5">Bottom</option>
                                
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="selectError3">Category Type</label>
                        <div class="controls">
                            <select id="selectError3" name="parent">
                                <option value="">Select Parent Category Type</option>
                                <option value="1">Parent</option>
                                <option value="0">Child</option>
                                
                            </select>
                        </div>
                    </div>
                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Category Description</label>
                        <div class="controls">
                            <textarea class="cleditor" name="category_description" id="textarea2" rows="3"><?php echo $category_info['category_description']; ?></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="selectError3">Publication Status</label>
                        <div class="controls">
                            <select id="selectError3" name="publication_status">
                                <option>Select Publication Status</option>
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" name="btn" class="btn btn-primary">Update Category</button>
                        <button type="reset" class="btn">Reset</button>
                    </div>
                </fieldset>
            </form>   
        </div>
    </div><!--/span-->
</div>
<script>
    document.forms['edit_category_form'].elements['publication_status'].value='<?php echo $category_info['publication_status']; ?>';
</script>
<script>
    document.forms['edit_category_form'].elements['position'].value='<?php echo $category_info['position']; ?>';
    document.forms['edit_category_form'].elements['parent'].value='<?php echo $category_info['parent']; ?>';
</script>







