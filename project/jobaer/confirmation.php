<?php


require ('classes/db_connect.php');
$a=new Db_Connect();

// Passkey that got from link
$passkey=$_GET['passkey'];
//echo '<pre/>';
//echo $passkey;
//exit();

$tbl_name1="tbl_temp_user";

// Retrieve data from table where row that match this passkey
$sql1="SELECT * FROM $tbl_name1 WHERE confirm_code ='$passkey'";
$result1=mysql_query($sql1);
//$r=  mysql_fetch_assoc($result1);
//$count=mysql_num_rows($result1);
//echo '<pre/>';
//print_r($count);
//exit();
// If successfully queried
if($result1){

// Count how many row has this passkey
$count=mysql_num_rows($result1);

// if found this passkey in our database, retrieve data from table "temp_members_db"
if($count==1){

$rows=  mysql_fetch_assoc($result1);

$name=$rows['user_name'];
$email=$rows['user_email'];
$user_gender=$rows['user_gender'];
$user_address=$rows['user_address'];
$user_password=$rows['user_password'];
$user_first_name=$rows['user_first_name'];

$country=$rows['user_country'];
$date=$rows['join_date'];
$uid=md5(uniqid(rand()));

//$tbl_name2="tbl_user";

// Insert data that retrieves from "temp_members_db" into table "registered_members"
$sql2="INSERT INTO tbl_user (user_name, user_email, user_gender, user_address, user_password, user_first_name, user_country, join_date, uid) VALUES ('$name', '$email', '$user_gender', '$user_gender', '$user_password', '$user_first_name', '$country', '$date', '$uid')";
$result2=mysql_query($sql2);
//echo '<pre/>';
//print_r($result2);
//exit();
}

// if not found passkey, display message "Wrong Confirmation code"
else{
    echo 'This link has been removed or your account has been already confirmed';
    exit();
}

// if successfully moved data from table"temp_members_db" to table "registered_members" displays message "Your account has been activated" and don't forget to delete confirmation code from table "temp_members_db"
    if ($result2){

echo "Your account has been activated";

// Delete information of this user from table "temp_members_db" that has this passkey
$sql3="DELETE FROM $tbl_name1 WHERE confirm_code = '$passkey'";
$result3=mysql_query($sql3);

}

}
