<?php
//session_start();
require_once 'db_connect.php';

class Super_Admin {
    //put your code here
    public function __construct() {
        $db_obj=new Db_Connect();
    }
    
    public function save_category($data) {
        $sql="INSERT INTO tbl_category (category_name, category_description, publication_status, cat_code, parent, position) VALUES ('$data[category_name]', '$data[category_description]', '$data[publication_status]', '$data[cat_code]', '$data[parent]', '$data[position]')";
        if(mysql_query($sql) ) {
            $message="Category information save successfully";
            return $message;
        }
        else {
            die('Query Problem'.  mysql_error() );
        }
        
    }
    public function select_all_category_info() {
        $sql="SELECT * FROM tbl_category WHERE deletion_status= 1 ";
        $query_result=mysql_query($sql);
        return $query_result;
        
    }
    
        public function select_all_published_category() {
        $sql="SELECT * FROM tbl_category WHERE deletion_status= 1 AND publication_status= 1 ";
        $category_result=mysql_query($sql);
        return $category_result;
    }
    
    
    public function select_category_info_by_category_id($category_id) {
        $sql="SELECT * FROM tbl_category WHERE category_id='$category_id' " ;
        $query_result=mysql_query($sql);
//        echo $query_result;
//        exit();
        return $query_result;
    }
    public function unpublished_category_by_category_id($category_id) {
        $sql="UPDATE tbl_category SET publication_status = 0 WHERE category_id='$category_id' " ;
        mysql_query($sql);
        $message="Category information unpublished successfully !";
        return $message;
    }
    public function published_category_by_category_id($category_id){
        $sql="UPDATE tbl_category SET publication_status = 1 WHERE category_id='$category_id' " ;
        mysql_query($sql);
        $_SESSION['message']='Category information published successfully !';
        header('Location:manage_category.php');
    }
    public function delete_category_by_category_id($category_id) {
        $sql="UPDATE tbl_category SET deletion_status = 0 WHERE category_id='$category_id' " ;
        mysql_query($sql);
        $_SESSION['message']="Category information delete successfully !";
        header('Location:manage_category.php');
    }
    public function update_category_info_by_id($data) {
        $sql="UPDATE tbl_category SET category_name='$data[category_name]', category_description='$data[category_description]', publication_status='$data[publication_status]', position='$data[position]' WHERE category_id='$data[category_id]' "; 
        if(mysql_query($sql)) {
            $_SESSION['message']='Category information update successfully';
           header('Location:manage_category.php');
        } else {
            die('Query problem'.  mysql_error() );
        }
    }
    
    public function save_news($data) {
        $sql="INSERT INTO tbl_news (news_title, news_description, news_publication_status) VALUES ('$data[news_title]', '$data[news_description]', '$data[news_publication_status]')";
        if(mysql_query($sql) ) {
            $message="News save successfully";
            return $message;
        }
        else {
            die('Query Problem'.  mysql_error() );
        }
        
    }
    
        public function select_all_news() {
        $sql="SELECT * FROM tbl_news WHERE news_deletion_status= 1 ORDER BY news_id DESC ";
        $query_result=mysql_query($sql);
        return $query_result;
    }
        public function select_all_news_deleted() {
        $sql="SELECT * FROM tbl_news WHERE news_deletion_status= 0 ";
        $query_result=mysql_query($sql);
        return $query_result;
    }
    
    
//        public function save_news_info($data) {
////        echo '<pre>';
////        print_r($data);
////        exit();
//        $sql="INSERT INTO tbl_news (news_title, news_description, news_publication_status,category_id) VALUES ('$data[news_title]', '$data[news_description]', '$data[news_publication_status]', '$data[category_id]' )";
//        if(mysql_query($sql)){ 
//           $message="Product information save succesfully";
//           return $message;
//        } else {
//            die('Query problem'.  mysql_error() );
//        }
//    }
            public function save_news_info($data, $files) {
//        echo '<pre>';
//        print_r($data);
//        
//        echo '<pre>';
//        print_r($files);
//        exit();

        if ($files['news_image']['name']) {
            $directory = '../admin/images/';
            $target_file = $directory . $files['news_image']['name'];
            $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
            $file_size = $files['news_image']['size'];
            $check = getimagesize($files['news_image']['tmp_name']);
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
                            $news_image=$target_file;
                            $sql = "INSERT INTO tbl_news (news_title, news_description,category_id, news_image, news_publication_status, admin_id) VALUES ('$data[news_title]', '$data[news_description]', '$data[category_id]', '$news_image', '$data[news_publication_status]', '$data[admin_id]')";
                            if (mysql_query($sql)) {
                               move_uploaded_file($files['news_image']['tmp_name'], $news_image);
                               //echo 'Image upload successfully';
                                $message = "News Published succesfully";
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
    
        public function unpublished_news_by_news_id($news_id) {
        $sql="UPDATE tbl_news SET news_publication_status = 0 WHERE news_id='$news_id' " ;
        mysql_query($sql);
        $message="Post unpublished successfully !";
        return $message;
    }
    
        public function published_news_by_news_id($news_id){
        $sql="UPDATE tbl_news SET news_publication_status = 1 WHERE news_id='$news_id' " ;
        mysql_query($sql);
        $_SESSION['message']='Post published successfully !';
        header('Location:manage_post.php');
    }   
        public function recover_news_by_news_id($news_id){
        $sql="UPDATE tbl_news SET news_deletion_status = 1 WHERE news_id='$news_id' " ;
        mysql_query($sql);
        $_SESSION['message']='Post published successfully !';
        header('Location:manage_post.php');
    }
    
        public function delete_news_by_news_id($news_id) {
        $sql="UPDATE tbl_news SET news_deletion_status = 0 WHERE news_id='$news_id' " ;
        mysql_query($sql);
        $_SESSION['message']="Post delete successfully !";
        header('Location:manage_post.php');
    }
    
       public function select_news_info_by_news_id($news_id) {
        $sql="SELECT * FROM tbl_news WHERE news_id='$news_id' " ;
        $query_result=mysql_query($sql);
//        echo $query_result;
//        exit();
        return $query_result;
    }
        public function update_news_info_by_id($data) {
      // $sql="UPDATE tbl_news SET news_title='$data[news_title]', category_id='$data[category_id]', news_description='$data[news_description]', news_publication_status='$data[news_publication_status]' WHERE news_id='$data[news_id]' "; 
        $sql = "UPDATE tbl_news SET news_title='$data[news_title]', category_id='$data[category_id]',news_description='$data[news_description]',news_publication_status='$data[news_publication_status]' WHERE news_id='$data[news_id]' ";
        if(mysql_query($sql)) {
            $_SESSION['message']='news information update successfully';
           header('Location:manage_post.php');
        } else {
            die('Query problem'.  mysql_error() );
        }
    }
    
    //end news section
    
//    advertise section
    
//        public function save_advertise($data) {
//        $sql="INSERT INTO tbl_ad (ad_title, ad_description, ad_publication_status) VALUES ('$data[ad_title]', '$data[ad_description]', '$data[ad_publication_status]')";
//        if(mysql_query($sql) ) {
//            $message="Your ad has been saved successfully";
//            return $message;
//        }
//        else {
//            die('Query Problem'.  mysql_error() );
//        }
//        
//    }
        public function select_ad_info_by_ad_id($ad_id) {
        $sql="SELECT * FROM tbl_ad WHERE ad_id='$ad_id' " ;
        $query_result=mysql_query($sql);
//        echo $query_result;
//        exit();
        return $query_result;
    }
        public function update_ad_info_by_id($data,$files) {
//                    echo '<pre>';
//        print_r($data);
//        
//        echo '<pre>';
//        print_r($files);
//        exit();
        if ($files['ad_image']['name']) {
            $directory = '../admin/images/';
            $target_file = $directory . $files['ad_image']['name'];
            $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
            $file_size = $files['ad_image']['size'];
            $check = getimagesize($files['ad_image']['tmp_name']);
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
                            $ad_image=$target_file;
        $sql=" UPDATE tbl_ad SET ad_title='$data[ad_title]', ad_description='$data[ad_description]', ad_image='$ad_image',ad_publication_status='$data[ad_publication_status]' WHERE ad_id='$data[ad_id]' "; 
        if(mysql_query($sql)) {
            move_uploaded_file($files['ad_image']['tmp_name'], $ad_image);
                                $_SESSION['message'] = "ad information has been updated succesfully";
//                                return $message;
                                header('Location:manage_ad.php');
           
        } else {
            die('Query problem2'.  mysql_error() );
        }
                        }
                    }
                }
            } else {
                echo 'This is an not an image. Please try again' . '<br/>';
                exit();
            }
        } 
        else {
            echo "Please select file. Thanks";
//            exit();
        }
    }           


    
        public function unpublished_ad_by_ad_id($ad_id) {
        $sql="UPDATE tbl_ad SET ad_publication_status = 0 WHERE ad_id='$ad_id' " ;
        mysql_query($sql);
        $message="ad information unpublished successfully !";
        return $message;
    }
    public function published_ad_by_ad_id($ad_id){
        $sql="UPDATE tbl_ad SET ad_publication_status = 1 WHERE ad_id='$ad_id' " ;
        mysql_query($sql);
        $_SESSION['message']='ad information published successfully !';
        header('Location:manage_ad.php');
    }
    public function delete_ad_by_ad_id($ad_id) {
        $sql="UPDATE tbl_ad SET ad_deletion_status = 0 WHERE ad_id='$ad_id' " ;
        mysql_query($sql);
        $_SESSION['message']="ad information delete successfully !";
        header('Location:manage_ad.php');
    }
        public function select_all_ad_info() {
        $sql="SELECT * FROM tbl_ad WHERE ad_deletion_status= 1 ";
        $query_result=mysql_query($sql);
        return $query_result;
        
    }
        public function save_advertise($data, $files) {
//        echo '<pre>';
//        print_r($data);
//        
//        echo '<pre>';
//        print_r($files);
//        exit();

        if ($files['ad_image']['name']) {
            $directory = '../admin/images/';
            $target_file = $directory . $files['ad_image']['name'];
            $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
            $file_size = $files['ad_image']['size'];
            $check = getimagesize($files['ad_image']['tmp_name']);
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
                            $ad_image=$target_file;
                            $sql = "INSERT INTO tbl_ad (ad_title, ad_description, ad_image, ad_publication_status) VALUES ('$data[ad_title]', '$data[ad_description]', '$ad_image', '$data[ad_publication_status]')";
                            if (mysql_query($sql)) {
                               move_uploaded_file($files['ad_image']['tmp_name'], $ad_image);
                               //echo 'Image upload successfully';
                                $message = "ad information save succesfully";
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
    
    //end advertise section
    //start option section
            public function update_logo($data,$files) {

        if ($files['image_name']['name']) {
            $directory = '../admin/images/';
            $target_file = $directory . $files['image_name']['name'];
            $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
            $file_size = $files['image_name']['size'];
            $check = getimagesize($files['image_name']['tmp_name']);
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
                            $image_name=$target_file;
        $sql=" UPDATE tbl_image SET image_name='$image_name' WHERE image_id=1 "; 
        if(mysql_query($sql)) {
            move_uploaded_file($files['image_name']['tmp_name'], $image_name);
                                $message = "Logo has been updated succesfully";
                                return $message;
                                //header('Location:manage_ad.php');
           
        } else {
            die('Query problem2'.  mysql_error() );
        }
                        }
                    }
                }
            } else {
                echo 'This is an not an image. Please try again' . '<br/>';
                exit();
            }
        } 
        else {
            echo "Please select file. Thanks";
//            exit();
        }
    }
    
    public function update_banner($data,$files) {

        if ($files['image_name']['name']) {
            $directory = '../admin/images/';
            $target_file = $directory . $files['image_name']['name'];
            $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
            $file_size = $files['image_name']['size'];
            $check = getimagesize($files['image_name']['tmp_name']);
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
                            $image_name=$target_file;
        $sql=" UPDATE tbl_image SET image_name='$image_name' WHERE image_id=2 "; 
        if(mysql_query($sql)) {
            move_uploaded_file($files['image_name']['tmp_name'], $image_name);
                                $message = "Banner has been updated succesfully";
                                return $message;
                                //header('Location:manage_ad.php');
           
        } else {
            die('Query problem2'.  mysql_error() );
        }
                        }
                    }
                }
            } else {
                echo 'This is an not an image. Please try again' . '<br/>';
                exit();
            }
        } 
        else {
            echo "Please select file. Thanks";
//            exit();
        }
    }
    
            public function select_social_link() {
        $sql="SELECT * FROM tbl_image";
        $social_result=mysql_query($sql);
        return $social_result;
    }
    
        public function update_social_link($data){
        $sql="UPDATE tbl_image SET social1_url ='$data[social1_url]', social2_url ='$data[social2_url]', social3_url ='$data[social3_url]', social4_url ='$data[social4_url]' WHERE image_id=1 " ;
        mysql_query($sql);
        $message='ad information published successfully !';
        return $message;
        //header('Location:manage_ad.php');
    }
    //end option section
        public function Category_position($category_id,$position) {
//        $sql ="SELECT * FROM tbl_news WHERE news_id='$news_id' limit 1 ";
        $sql ="UPDATE tbl_category SET position=$position WHERE category_id = '$category_id' ";
        $category_position=mysql_query($sql);
        return $category_position;
                    }


    public function logout()
    {
        unset($_SESSION['admin_name']);
        unset($_SESSION['admin_id']);
        $_SESSION['message']='You Are Successfully Logout !';

        header('Location:index.php');
    }

    public function get_comment()
    {
        $sql="SELECT * FROM tbl_comment ORDER BY comment_id DESC";
        $result=mysql_query($sql);

        return $result;

    }
    public function disapprove_comment($comment_id) {
        $sql="UPDATE tbl_comment SET publish_status = 0 WHERE comment_id='$comment_id' " ;
        mysql_query($sql);
        $message="comment unpublished successfully !";
        return $message;
    }
    
        public function approve_comment($comment_id){
        $sql="UPDATE tbl_comment SET publish_status = 1 WHERE comment_id='$comment_id' " ;
        mysql_query($sql);
        $message='comment published successfully !';
        return $message;
        header('Location:comment.php');
    }
        public function delete_comment($comment_id){
        $sql="DELETE FROM tbl_comment WHERE comment_id='$comment_id' " ;
        mysql_query($sql);
        $message='comment deleted successfully !';
        return $message;
        header('Location:comment.php');
    }

    public function remove_top_news($news_id) {
        $sql="UPDATE tbl_news SET top_news = 0 WHERE news_id='$news_id' " ;
        mysql_query($sql);
        $message="Removed From Top News!";
        return $message;
    }
    public function top_news($news_id) {
        $sql="UPDATE tbl_news SET top_news = 1 WHERE news_id='$news_id' " ;
        mysql_query($sql);
        $message="Mark as Top News !";
        return $message;
    }
    public function get_user() {
        $sql="SELECT * FROM tbl_user" ;
        $user=mysql_query($sql);
        return $user;
    }
    public function delete_user($user_id){
        $sql="DELETE FROM tbl_user WHERE user_id='$user_id' " ;
        mysql_query($sql);
        $message='user deleted successfully !';
        return $message;
        header('Location:manage_user.php');
    }
    public function footer_copyright($data){
        $sql="UPDATE tbl_ad SET ad_description ='$data[ad_description]' WHERE ad_id=4" ;
        mysql_query($sql);
        $message='Footer Info save successfully !';
           return $message;
        header('Location:options.php');

    }
    public function get_admin() {
        $sql="SELECT * FROM tbl_admin" ;
        $user=mysql_query($sql);
        return $user;
    }
    public function delete_admin($admin_id){
        if ($_SESSION['access_level']==1) {
            if ($_SESSION['admin_id']!=$admin_id) {
               $sql="DELETE FROM tbl_admin WHERE admin_id='$admin_id' " ;
        mysql_query($sql);
        $message='user deleted successfully !';
        return $message;
        header('Location:manage_admin.php');
            }else{
            $message='You Cannot Remove Yourself!';
             return $message;
           
        }
    }else{
            $message='You Cannot Remove Super Admin!';
             return $message;
        }
        

    }
	public function get_comment1(){
		$sql="SELECT * FROM tbl_comment" ;
        $comment=mysql_query($sql);
        return $comment;
	}
	public function total_news_count() {
        $sql="SELECT * FROM tbl_news";
        $query_result=mysql_query($sql);
		$query_result=mysql_num_rows($query_result);
        return $query_result;
    }
	public function last_5_user() {
        $sql="SELECT * FROM tbl_user ORDER BY user_id DESC LIMIT 5";
        $query_result=mysql_query($sql);
        return $query_result;
    }
	public function last_8_news() {
        $sql="SELECT * FROM tbl_news ORDER BY news_id DESC LIMIT 8";
        $query_result=mysql_query($sql);
        return $query_result;
    }
	public function last_week_news() {
        $sql="SELECT * FROM tbl_news WHERE news_date between date_sub(now(),INTERVAL 1 WEEK) and now()";
        $query_result=mysql_query($sql);
        return $query_result;
    }
	public function last_week_comment() {
        $sql="SELECT * FROM tbl_comment WHERE create_time between date_sub(now(),INTERVAL 1 WEEK) and now()";
        $query_result=mysql_query($sql);
		$query_result=mysql_num_rows($query_result);
        return $query_result;
    }
	public function last_week_user() {
        $sql="SELECT * FROM tbl_user WHERE join_date between date_sub(now(),INTERVAL 1 WEEK) and now()";
        $query_result=mysql_query($sql);
		$query_result=mysql_num_rows($query_result);
        return $query_result;
    }
	
	public function save_video($data) {
		
		
        $sql="INSERT INTO tbl_video (video_title, video_description, video_name) VALUES ('$data[video_title]', '$data[video_description]', '$data[video_name]')";
		$result=mysql_query($sql);
		
		if($result){
			$message="Saved Successfully";
			return $message;
		}else {
            die('Query problem2'.  mysql_error() );
        }
        
        }
    
		
		
		
		
        
        
        
    
	
	

}

