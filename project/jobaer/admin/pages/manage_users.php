<?php

if (isset($_GET['status'])) {
    
    if ($_GET['status'] == 'delete') {
        $user_id = $_GET['user_id'];
        $message = $sup_obj->delete_user($user_id);
    }
    
    
}

$query_result = $sup_obj->get_user();
// $data = mysql_fetch_assoc($query_result);
// echo "<pre/>";
// print_r($data);
// exit();
?>
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Tables</a></li>
</ul>
<h2 style="color: #0000cc;">
    <?php
    if (isset($message)) {
        echo $message;
        unset($message);
    }
    ?>
</h2>
<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>

            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>Serial No</th>
                        <th>User name</th>
                        <th>Email</th>
                        <th>Picture</th>
                        <th>Status</th>
                        <th>Actions</th>
                        
                    </tr>
                </thead>   
                <tbody>
                    <?php $i = 1;
                    while ($data = mysql_fetch_assoc($query_result)) {
                        // echo "<pre/>";
// print_r($data);
// exit();
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td class="center"><?php echo $data['user_name']; ?></td>
                            <td class="center"><?php echo $data['user_email']; ?></td>
                            <td class="center"><img class="img-responsive" src="../<?php echo $data['profile_pic'];?>" height="50px" width="50px"></td>
                            <td class="center">
                                <?php
                                if ($data['user_gender'] == 1) {
                                    echo '<span class="label label-success">
                                                active
                                            </span>';
                                } else {
                                    echo '<span class="label label-warning">
                                                inactive
                                            </span>';
                                }
                                ?>
                            </td>
                            <td class="center">
                                <a class="btn btn-danger" href="?status=delete&user_id=<?php echo $data['user_id']; ?>" title="Delete" onclick="return check_delete(); ">
                                    <i class="halflings-icon white trash"></i> 
                                </a>
                            </td>
                            
                        </tr>
                        <?php $i++;
                    }
                    ?>
                </tbody>
            </table>            
        </div>
    </div>
</div>