<?php
require 'db_connect.php';
session_start();
class Login {
    //put your code here
    public function __construct() {
        $db_obj=new Db_Connect();
    }
    
    public function check_admin_login($data)
    {
        $password=md5($data['admin_password']);
        $sql="SELECT * FROM tbl_admin WHERE admin_email_address ='$data[admin_email_address]' AND admin_password='$password' ";
        //$result=mysql_query($sql);
        if($result=mysql_query($sql))
        {
            $admin_info=  mysql_fetch_assoc($result);
//            echo '<pre>';
//            var_dump($admin_info);
//            exit();
            $_SESSION['access_level']=$admin_info['access_level'];
            if($admin_info)
            {
               $_SESSION['admin_name']=$admin_info['admin_name'];
               $_SESSION['admin_id']=$admin_info['admin_id'];
                header('Location:admin_master.php');
            }
            else{
            //die('SQL Error :'.mysql_error());
            //header('Location:index.php');
            $message='Your User Id Or Password Invalide !';
            return $message;
        }
        }
        
        
        
        
    }

  
}
