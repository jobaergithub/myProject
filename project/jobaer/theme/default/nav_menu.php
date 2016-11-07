<?php
   $result= $app_obj->select_all_published_category();
   $result1= $app_obj->select_all_published_category();
   
//   echo '<pre/>';
//   print_r($a);
//   exit();
if(isset($_SESSION['uid'])){$uid=$_SESSION['uid'];}

?>

<nav class="nav navbar-default navbar-custom hidden-sm hidden-xs">
    <div class="container-fluid hidden-sm" style="padding-left: 0;" >
                   <div class="nav navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="padding-left: 0;">
            <ul class="nav navbar-nav">
                <li><a class="glyphicon glyphicon-home" href="<?php echo $site_url?>"></a></li>
                <?php
                while($row=  mysql_fetch_assoc($result))
                {
            ?>
            <li><a class="color1" href="category.php?category_id=<?php echo $row['category_id']?>"><?php echo $row['category_name']?></a></li>
                <?php } ?>
<!--                <li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle" href="#">Authority</a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Principle</a></li>
                        <li><a href="#">Vice-Principle</a></li>
                        <li><a href="#">Accounts</a></li>
                    </ul>
                </li>-->
                
                <li><a href="contact.php">Contact</a></li>
<ul class="nav navbar-nav navbar-right">

                <li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php
				if(isset($_SESSION['user_name'])){
					echo $_SESSION['user_name'];
				}else{
					echo 'Account';
				}
				?></a>
                    <ul class="dropdown-menu">
                        

                        
                        <?php
                            
                            if(isset($_SESSION['user_id'])) {
                        ?>
                         <li><a href="profile.php?user_id=<?php echo $_SESSION['user_id'];?>">Profile</a></li>
						 <li><a href="profile_pic_change.php?user_id=<?php echo $_SESSION['user_id'];?>&&uid=<?php echo $uid;?>">Profile Pic</a></li>
                        <li><a href="activity.php?user_id=<?php echo $_SESSION['user_id'];?>">activity</a></li>                       
                        <li><a href="?logout=true"><i class="halflings-icon off"></i> Logout</a></li>

                            <?php } else { ?>
                        <li> <a href="login.php"><span>Login</span></a></li>
                        <li><a href="registration.php">Register</a></li>
                            <?php } ?>
                        
                    </ul>
                </li>
           

            </ul>

            </ul>
        </div>
    </div>
    </nav> 
<nav class="nav navbar-default navbar-custom visible-xs visible-sm">
    
    <div class="container-fluid" >
                   <div class="nav navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-12" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                       <a class="navbar-brand" href="#">AKH</a>
                    </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-12">
            <ul class="nav navbar-nav">
   <?php
                while($row=  mysql_fetch_assoc($result1))
                {
            ?>
            <li><a class="color1" href="category.php?category_id=<?php echo $row['category_id']?>"><?php echo $row['category_name']?></a></li>
                <?php } ?>            
<!--                <li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle" href="#">Authority</a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Principle</a></li>
                        <li><a href="#">Vice-Principle</a></li>
                        <li><a href="#">Accounts</a></li>
                    </ul>
                </li>-->
               
                <li><a href="#">Contact</a></li>

 
           

            </ul>

            </ul>
        </div>
    </div>
</nav>
        
   
