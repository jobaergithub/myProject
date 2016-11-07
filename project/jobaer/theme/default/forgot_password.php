<?php
if (isset($_POST['btn'])) {
    $message = $app_obj->update_password($_POST);
}
?>
<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Forgot Your Password?</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="login1.php">Login</a></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

<form id="loginform" class="form-horizontal" role="form" action="" method="post">
                                    <h3 class="text-success">
            <?php if(isset($message)) {echo $message;unset($message);}?>
        </h3>
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="user_email" value="" placeholder="email">                                        
                                    </div>
         

                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                        <button type="submit" id="btn-login" class="btn btn-success" name="btn">Submit</button>
                                        
                                   
                                    </div>
                                </div>
                        </form>
                    </div>
            </div>
</div>
