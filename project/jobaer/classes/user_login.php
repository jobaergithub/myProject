<?php
session_start();
require 'db_connect.php';


class user_login {

    //put your code here
    public function __construct() {
        $db_obj = new Db_Connect();
    }

    public function user_login_check($data) {
        $password=md5($data['user_password']);
        $sql = "SELECT * FROM tbl_user WHERE user_email='$data[user_email]' AND user_password='$password' ";
        $result = mysql_query($sql);
      // $result = mysql_num_rows($result);
       // $result=  mysql_fetch_assoc($result);
      // echo $result['user_id'];
//        print_r($result);
//        
       // exit();
        $result= mysql_fetch_assoc($result);

                      //echo $result1['user_id'];
        //exit();
        if ($result) {
            
               $_SESSION['user_name']=$result['user_name'];
               $_SESSION['user_id']=$result['user_id'];
			   $_SESSION['uid']=$result['uid'];
            
            header('location: index.php');
        } else {
            //die('SQL Error :'.mysql_error());
            //header('Location:index.php');
            $message = 'Your User Id Or Password Invalide !';
            return $message;
        }
    }
}
?>
