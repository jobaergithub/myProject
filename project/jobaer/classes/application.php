<?php
require 'db_connect.php';
class Application {
    //put your code here
    public function __construct() {
        $db_connect=new Db_Connect();
    }
    
            public function select_all_news() {
        $sql="SELECT * FROM tbl_news WHERE news_deletion_status= 1 AND news_publication_status= 1 ORDER BY news_id DESC";
        $all_news_select_result=mysql_query($sql);
        return $all_news_select_result;
    }
                   public function select_all_news_from_news_id($news_id) {
        $sql ="SELECT * FROM tbl_news WHERE news_id='$news_id' ";
        
        $select_all_news_from_news_id_result=mysql_query($sql);
        return $select_all_news_from_news_id_result;
                    }
                    public function select_all_news_from_news($news_id) {
//        $sql ="SELECT * FROM tbl_news WHERE news_id='$news_id' limit 1 ";
        $sql ="UPDATE tbl_news SET views=views+1 WHERE news_id = '$news_id' ";
        $select_all_news_from_news_id_result=mysql_query($sql);
        return $select_all_news_from_news_id_result;
                    }
                    public function kar() {
        $sql ="SELECT * FROM tbl_news ORDER BY views DESC LIMIT 10";
        
        $k=mysql_query($sql);
        return $k;
                    }
                public function get_news($category_id) {
        $sql="SELECT * FROM tbl_news WHERE news_deletion_status= 1 AND news_publication_status= 1 AND category_id='$category_id' ORDER BY news_id DESC LIMIT 4 OFFSET 1";
        $get_news=mysql_query($sql);
        return $get_news;
    }
                    public function select_all_news_from_news_id_5($category_id) {
        $sql="SELECT * FROM tbl_news WHERE news_deletion_status= 1 AND news_publication_status= 1 AND category_id='$category_id' ORDER BY news_id DESC ";
        $select_all_news_from_news_id_1_result1=mysql_query($sql);
        return $select_all_news_from_news_id_1_result1;
    }
	public function get_images_news($category_id) {
        $sql="SELECT * FROM tbl_news WHERE news_deletion_status= 1 AND news_publication_status= 1 AND category_id='$category_id' ORDER BY news_id DESC LIMIT 3 ";
        $get_images_news=mysql_query($sql);
        return $get_images_news;
    }
                    public function get_image($category_id) {
        $sql="SELECT * FROM tbl_news WHERE news_deletion_status= 1 AND news_publication_status= 1 AND category_id='$category_id' ORDER BY news_id DESC LIMIT 1";
        $get_image=mysql_query($sql);
        return $get_image;
    }
	               public function get_gallery() {
        $sql="SELECT * FROM tbl_news WHERE news_deletion_status= 1 AND news_publication_status= 1 ORDER BY news_id DESC LIMIT 8";
        $get_image=mysql_query($sql);
        return $get_image;
    }
            public function select_all_published_category() {
        $sql="SELECT * FROM tbl_category WHERE deletion_status= 1 AND publication_status= 1 AND cat_code= 0 AND parent=1 ";
        $category_result=mysql_query($sql);
        return $category_result;
    }
       public function select_all_category($category_id) {
        $sql="SELECT * FROM tbl_category WHERE category_id='$category_id' ";
        $category_result=mysql_query($sql);
        return $category_result;
    }
 
                public function select_logo() {
        $sql="SELECT * FROM tbl_image WHERE image_id=1 ";
        $logo_result=mysql_query($sql);
        return $logo_result;
    }
                    public function select_banner() {
        $sql="SELECT image_name FROM tbl_image WHERE image_id=2 ";
        $banner_result=mysql_query($sql);
        return $banner_result;
    }
                public function select_social_link() {
        $sql="SELECT * FROM tbl_image";
        $social_result=mysql_query($sql);
        return $social_result;
    }
    public function select_tbl_ad() {
        $sql="SELECT * FROM tbl_ad WHERE ad_publication_status=1 AND ad_deletion_status=1 ORDER BY ad_id DESC";
        $ad_result=mysql_query($sql);
        return $ad_result;
    }
        public function select_category_info_by_category_id($category_id) {
        $sql="SELECT * FROM tbl_category WHERE category_id='$category_id' " ;
        $query_result=mysql_query($sql);
//        echo $query_result;
//        exit();
        return $query_result;
    }
    //user section
    Public function domain_exists($email,$record = 'MX')
{
	list($user,$domain) = split('@',$email);
	return checkdnsrr($domain,$record);
}
    public function save_user($data) {
        $date=date("Y-m-d");
        $date=date("Y-m-d",strtotime($date));
        $confirm_code=md5(uniqid(rand()));
        $password=md5($data['user_password']);
        $email=mysql_real_escape_string($data['user_email']);
        $user_name=mysql_real_escape_string($data['user_name']);
        if ($this->domain_exists($email)) {
            
 $sql2="SELECT * FROM tbl_temp_user  WHERE user_name ='$user_name' OR user_email ='$email' ";
$result2=mysql_query($sql2);
$count1=mysql_num_rows($result2);
 if($count1==1){
     $message= 'You have not verified your email.Check your inbox or spam';
     return $message;
 }else {
        $sql1="SELECT * FROM tbl_user WHERE user_name ='$user_name' OR user_email ='$email' ";
        $result1=mysql_query($sql1);
        $count=mysql_num_rows($result1);
        if($count==1){
            
            $message='Username or Email has already registered';
            return $message;
            
        }else
        {
        $sql="INSERT INTO tbl_temp_user (user_name, user_email, user_gender, user_address, user_password, user_first_name, user_country, confirm_code, join_date) VALUES ('$user_name', '$email', '$data[user_gender]', '$data[user_address]', '$password', '$data[user_first_name]', '$data[user_country]','$confirm_code', '$date')";
        if(mysql_query($sql) ) {
            $to=$email;

// Your subject
$subject="Your confirmation link here";

// From
$header="from: your name <your email>";

// Your message
$message="Your Comfirmation link \r\n";
$message.="Click on this link to activate your account \r\n";
$message.="<a href='http://localhost/news_project/confirmation.php?passkey=$confirm_code'>Click here</a>";


// send email
$sentmail = mail($to,$subject,$message,$header);
//            $message="Registration successfull";
//            return $message;
        }
        else {
die('Query Problem'.  mysql_error() );
        }
        
        }
if($sentmail){
$message="Your Confirmation link Has Been Sent To Your Email Address.";
return $message;
}
else {
echo "Cannot send Confirmation link to your e-mail address";
}
        
    }
    }  else {
        $message='No MX record exists;  Invalid email!';
        return $message;
    }
    }
    //end user
public function select_tbl_admin($admin_id) {
        $sql="SELECT admin_name FROM tbl_admin WHERE admin_id='$admin_id' ";
        $admin_result=mysql_query($sql);
        return $admin_result;
    }
    
     public function logout()
    {
        unset($_SESSION['user_name']);
        unset($_SESSION['user_id']);
        $_SESSION['message']='You Are Successfully Logout !';
        header('Location:index.php');
    }
    function curPageURL() {
 $pageURL = 'http';
// if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}

    public function save_comment($data,$news_id,$user_id) {
        $sql="INSERT INTO tbl_comment (comment_content, parent,news_id, user_id) VALUES ('$data[comment_content]', '$data[parent]','$news_id', '$user_id')";
        if(mysql_query($sql) ) {
            $message="Your comment waiting for moderation";
            return $message;
        }
        else {
            die('Query Problem'.  mysql_error() );
        }
        
    }
    public function select_tbl_comment($news_id) {
        $sql="SELECT * FROM tbl_comment WHERE news_id='$news_id' ";
        $comment_result=mysql_query($sql);
        return $comment_result;
    }
    public function update_password($data) {
        $email=$data['user_email'];
        $sql="SELECT * FROM tbl_user WHERE user_email='$data[user_email]' ";
        $result=  mysql_query($sql);
        $result=  mysql_num_rows($result);
//        echo '<pre/>';
//        echo $result;
//        exit();
        if ($result=1) {
            $pass=uniqid(rand());
            $password=md5($pass);
             $sql ="UPDATE tbl_user SET user_password='$password' WHERE user_email = '$data[user_email]' ";
        $result2=mysql_query($sql);
        if ($result2) {
            $to=$email;

// Your subject
$subject="Your Password";

// From
$header="from: no-reply@gnews.com";

// Your message
$message="Your Temporary Password \r\n";
$message.=" is $pass";
$message.="<a href='http://localhost/news_project/login1.php'>Login here</a>";


// send email
$sentmail = mail($to,$subject,$message,$header);
//            $message="Registration successfull";
//            return $message;
        }
        else {
           $message="No email found";
return $message;
        }
        
        }
if($sentmail){
$message="Your password Has Been Sent To Your Email Address.";
return $message;
}
else {
    $message="Cannot send Confirmation link to your e-mail address";
return $message;
}
        
    }
 
        
        
        
       public function get_user($user_id,$uid) {
        $sql="SELECT * FROM tbl_user WHERE user_id='$user_id' AND uid='$uid' ";
        $result=mysql_query($sql);
        return $result;
    }
	public function get_user1($user_id) {
        $sql="SELECT * FROM tbl_user WHERE user_id='$user_id' ";
        $result=mysql_query($sql);
        return $result;
    }
                    
    

    public function profile_update($data) {
        $password=md5($data['user_password']);
      // $sql="UPDATE tbl_news SET news_title='$data[news_title]', category_id='$data[category_id]', news_description='$data[news_description]', news_publication_status='$data[news_publication_status]' WHERE news_id='$data[news_id]' "; 
        $sql = "UPDATE tbl_user SET user_name='$data[user_name]', user_first_name='$data[user_first_name]',user_password='$password',user_email='$data[user_email]',user_country='$data[user_country]',user_gender='$data[user_gender]',user_address='$data[user_address]' WHERE user_id='$data[user_id]' ";
        if(mysql_query($sql)) {
            $message='Your profile update successfully';
			return $message;
        
        } else {
            die('Query problem'.  mysql_error() );
        }
    
    }
    public function get_user_comment($user_id) {
        $sql="SELECT * FROM tbl_comment WHERE user_id='$user_id' ";
        $result=mysql_query($sql);
        return $result;
    }

    public function profile_pic($data, $files) {
//        echo '<pre>';
//        print_r($data);
//        
//        echo '<pre>';
//        print_r($files);
//        exit();

        if ($files['profile_pic']['name']) {
            $directory = 'images/';
            $target_file = $directory . $files['profile_pic']['name'];
            $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
            $file_size = $files['profile_pic']['size'];
            $check = getimagesize($files['profile_pic']['tmp_name']);
            if ($check) {
                if (file_exists($target_file)) {
                    echo "Image already exists";
                    exit();
                } else {
                    if ($file_size > 10000000) {
                        echo 'File size is too large';
                        exit();
                    } else {
                        if ($file_type != 'jpg' && $file_type != 'png') {
                            echo "File type is not valid";
                            exit();
                        } else {
                            $profile_pic=$target_file;
                            $sql =" UPDATE tbl_user SET profile_pic='$profile_pic' WHERE user_id='$data[user_id]' AND uid='$data[uid]'";
                            if (mysql_query($sql)) {
                               move_uploaded_file($files['profile_pic']['tmp_name'], $profile_pic);
                               //echo 'Image upload successfully';
                                $message = "Your Profile Picture save succesfully";
                                return $message;
                            } else {
                                die('Query problem' . mysql_error());
                            }
                        }
                    }
                }
            } else {
                echo 'This is an not an image. Please try again' . '<br/>';
                exit();
            }
        } else {
            echo "Please select file. Thanks";
            exit();
        }
    }
	public function all_info($user_id){
		$sql="SELECT * FROM tbl_user,tbl_comment,tbl_news WHERE tbl_comment.user_id=tbl_user.user_id AND tbl_news.news_id=tbl_comment.news_id AND tbl_comment.user_id='$user_id' ";
		$result=mysql_query($sql);
		return $result;
	}
	public function get_user_com($news_id){
		$sql="SELECT * FROM tbl_news,tbl_user,tbl_comment WHERE tbl_comment.user_id=tbl_user.user_id AND tbl_news.news_id=tbl_comment.news_id AND tbl_comment.publish_status=1 AND tbl_comment.news_id='$news_id' ";
		$result=mysql_query($sql);
		return $result;
	}

    public function get_child_category_news($category_id) {
        $sql="SELECT * FROM tbl_category,tbl_news WHERE tbl_category.category_id=tbl_news.category_id AND tbl_category.publication_status=1 AND tbl_category.deletion_status=1 AND tbl_news.news_publication_status=1 AND tbl_news.news_deletion_status=1 AND tbl_category.category_id='$category_id' ORDER BY news_id DESC";
        $get_child_category_news=mysql_query($sql);
        return $get_child_category_news;
    }

    
    public function get_top_news() {
        $sql="SELECT * FROM `tbl_news` WHERE Top_news=1 ";
        $top_news=mysql_query($sql);
        return $top_news;
    }
	public function get_footer() {
        $sql="SELECT * FROM tbl_ad WHERE ad_id=4 AND ad_publication_status=0 AND ad_deletion_status=0";
        $result=mysql_query($sql);
        return $result;
    }
	public function get_video() {
        $sql="SELECT * FROM tbl_video LIMIT 8";
        $result=mysql_query($sql);
        return $result;
    }

    
    
}
