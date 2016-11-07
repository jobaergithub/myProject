<?php
    $news_id=$_GET['news_id'];
    $query_result=$sup_obj->select_news_info_by_news_id($news_id);
    //echo $query_result;
    $news_info=mysql_fetch_assoc($query_result);
    $category_result=$sup_obj->select_all_published_category();
    //echo '<pre/>';
   // print_r($news_info['news_id']);
   // exit();
//    echo '<pre>';
//    print_r($category_info);
//    exit();
    
    if(isset($_POST['btn'])) {
        $sup_obj->update_news_info_by_id($_POST);
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
            <form name="edit_news_form" class="form-horizontal" action="" method="post">
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
                            <input type="text" name="news_title"  value="<?php echo $news_info['news_title']; ?>" class="span6 typeahead" id="typeahead"  >
                            <input type="hidden" name="news_id"  value="<?php echo $news_info['news_id']; ?>" class="span6 typeahead" id="typeahead"  >
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="selectError3">Category Name</label>
                        <div class="controls">
<select id="selectError3" name="category_id">
                                <option value="">Select Category Name</option>
                                <?php while ($category_info =  mysql_fetch_assoc($category_result) ) { ?>
                                <option value="<?php echo $category_info['category_id']; ?>"
                                    <?php

                                    if ($category_info['category_id'] == $news_info['category_id']) {
                                         echo " selected";
                                     } 

                                    ?>

                                    ><?php echo $category_info['category_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">News Description</label>
<div class="controls">
                            <textarea class="cleditor" name="news_description" id="textarea2" rows="3"><?php echo $news_info['news_description']; ?></textarea>
                        </div>
                    </div>
                    
                    
                    <div class="control-group">
                        <label class="control-label" for="selectError3">Publication Status</label>
                        <div class="controls">
                            <select id="selectError3" name="news_publication_status">
                                <option>Select Publication Status</option>
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" name="btn" class="btn btn-primary">Save Category</button>
                        <button type="reset" class="btn">Reset</button>
                    </div>
                </fieldset>
            </form>   
        </div>
    </div><!--/span-->
</div><!--/row-->
<script>
    document.forms['edit_news_form'].elements['news_publication_status'].value='<?php echo $news_info['news_publication_status']; ?>';
    
</script>
