<?php
//require 'classes/application.php';
//$app_obj1=new Application();
$result= $app_obj->get_footer();
$result_footer= mysql_fetch_assoc($result);

?>


 <footer>
 <div class="row top_buffer"></div>
<p class="bg-success text-center" style="background-color: #9BAED7;color: #1B3772;">©<?php echo $result_footer['ad_description'];?></p></footer>