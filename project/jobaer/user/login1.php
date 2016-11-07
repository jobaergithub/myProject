<?php
//ob_start();

      require '../classes/user_login.php';
$login_obj = new User_login();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    if ($user_id != NULL) {
        header('Location:index.php');
    }
}
if (isset($_POST['btn'])) {
    $message = $login_obj->user_login_check($_POST);
}
//$session_id=  session_id();
//echo $session_id;

//echo $_SERVER['HTTP_REFERER'];
//echo '<pre/>';
//print_r($_POST);
//   
?>
<h1 class="well">Registration Form</h1>
<div class="col-lg-12 well">
    <div class="row">
        <h3 class="text-success">
            <?php if(isset($message)) {echo $message;unset($message);}?>
        </h3>
        <form class="form-horizontal" role="form" action="" method="post">
                                <h3 style="color: red">

<?php
if (isset($message)) {
    echo $message;
    unset($message);
}
?>
                        </h3>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="email">Email:</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" name="user_email" placeholder="Enter email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="pwd">Password:</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="user_password" class="form-control" id="pwd" placeholder="Enter password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <div class="checkbox">
                                            <label><input type="checkbox"> Remember me</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" name="btn" class="btn btn-primary">Login</button>
                                    </div>
                                </div>
                            </form>
