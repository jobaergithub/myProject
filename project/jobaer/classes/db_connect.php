<?php
class Db_Connect {
    //put your code here
    public function __construct() {
        $hostname='localhost';
        $username='root';
        $password='';
        $db_name='db_newspaper';
        $conn=  mysql_connect($hostname,$username,$password);
        if($conn)
        {
            //echo 'Database Server Connected';
            mysql_select_db($db_name);
        }
        else{
            die('Database Server Not Connected !'.  mysql_error());
        }
        
    }
}
