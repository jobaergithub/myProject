<?php
ob_start();

session_start();
require '../classes/super_admin.php';
$sup_obj = new Super_Admin();

$admin_id = $_SESSION['admin_id'];
if ($admin_id == NULL) {
    header('Location:index.php');
}

if (isset($_GET['logout'])) {
    $sup_obj->logout();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- start: Meta -->
        <meta charset="utf-8">
        <title>Bootstrap Metro Dashboard by Dennis Ji for ARM demo</title>
        <meta name="description" content="Bootstrap Metro Dashboard">
        <meta name="author" content="Dennis Ji">
        <meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
        <!-- end: Meta -->

        <!-- start: Mobile Specific -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- end: Mobile Specific -->

        <!-- start: CSS -->
        <link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
        <link id="base-style" href="css/style.css" rel="stylesheet">
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        
        
        <link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
        <!-- end: CSS -->


        <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
                <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
                <link id="ie-style" href="css/ie.css" rel="stylesheet">
        <![endif]-->

        <!--[if IE 9]>
                <link id="ie9style" href="css/ie9.css" rel="stylesheet">
        <![endif]-->

        <!-- start: Favicon -->
        <link rel="shortcut icon" href="img/favicon.ico">
        <!-- end: Favicon -->
        <script type="text/javascript" >
            function check_delete()
            {
                chk=confirm('Are you Sure To Delete This ?');
                if(chk)
                {
                    return true;
                }
                else{
                    return false;
                }
            }
        
        </script>



    </head>

    <body>
        <!-- start: Header -->
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="index.php"><span>Metro</span></a>

                    <!-- start: Header Menu -->
                    <div class="nav-no-collapse header-nav">
                        <ul class="nav pull-right">
                            <li class="dropdown hidden-phone">
                                <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="halflings-icon white warning-sign"></i>
                                </a>
                                
                            </li>
                            <!-- start: Notifications Dropdown -->
                            <li class="dropdown hidden-phone">
                                <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="halflings-icon white tasks"></i>
                                </a>
                               
                            <!-- start: User Dropdown -->
                            <li class="dropdown">
                                <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="halflings-icon white user"></i> <?php echo $_SESSION['admin_name'] ?>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="dropdown-menu-title">
                                        <span>Account Settings</span>
                                    </li>
                                    <li><a href="#"><i class="halflings-icon user"></i> Profile</a></li>
                                    <li><a href="?logout=true"><i class="halflings-icon off"></i> Logout</a></li>
                                </ul>
                            </li>
                            <!-- end: User Dropdown -->
                        </ul>
                    </div>
                    <!-- end: Header Menu -->

                </div>
            </div>
        </div>
        <!-- start: Header -->

        <div class="container-fluid-full">
            <div class="row-fluid">

                <!-- start: Main Menu -->
                <div id="sidebar-left" class="span2">
                    <div class="nav-collapse sidebar-nav">
                        <ul class="nav nav-tabs nav-stacked main-menu">
                            <li><a href="admin_master.php"><i class="icon-dashboard"></i><span class="hidden-tablet">Dashboard</span></a></li>
                            <li>
                                <a class="dropmenu" href="#"><span class="icon-plus"></span><span class="hidden-tablet">Category</span><span class="label label-important">2</span></a>
                                <ul>
                                    <li><a class="submenu" href="category.php"><i class="icon-file-alt"></i><span class="hidden-tablet">Add Category</span></a></li>
                                    <li><a class="submenu" href="manage_category.php"><i class="icon-file-alt"></i><span class="hidden-tablet">Manage Category</span></a></li>

                                </ul>	
                            </li>
                                                       <li>
                                <a class="dropmenu" href="#"><span class="icon-plus"></span><span class="hidden-tablet">Post</span><span class="label label-important">2</span></a>
                                <ul>
                                    <li><a class="submenu" href="news.php"><i class="icon-file-alt"></i><span class="hidden-edit">Add Post</span></a></li>
                                    <li><a class="submenu" href="manage_post.php"><i class="icon-file-alt"></i><span class="hidden-tablet">Manage Post</span></a></li>
                                    <li><a class="submenu" href="trash.php"><i class="icon-trash"></i><span class="hidden-tablet">Trash</span></a></li>

                                </ul>	
                            </li>
                            <li>
                             <!--    <a class="dropmenu" href="#"><span class="icon-plus"></span><span class="hidden-tablet">Advertise</span><span class="label label-important">2</span></a>
                               <ul>
    <li><a class="submenu" href="ad.php"><i class="icon-file-alt"></i><span class="hidden-tablet">Post Ad</span></a></li>
                            <li><a class="submenu" href="manage_ad.php"><i class="icon-file-alt"></i><span class="hidden-tablet">Manage Ad</span></a></li>

                                </ul>-->	
                            </li>
                            <li>
                                <a class="dropmenu" href="#"><span class="icon-plus"></span><span class="hidden-tablet">Users</span><span class="label label-important">2</span></a>
                                <ul>
    <li><a class="submenu" href="manage_user.php"><i class="icon-file-alt"></i><span class="hidden-tablet">Manage Users</span></a></li>
                            <li><a class="submenu" href="manage_admin.php"><i class="icon-file-alt"></i><span class="hidden-tablet">Manage Admin</span></a></li>
                                </ul>	
                            </li>
                          
                   <li><a class="submenu" href="options.php"><i class="icon-m"></i><span class="hidden-tablet">Options</span></a></li>
                            <li><a class="submenu" href="comment.php"><i class="icon-comment"></i><span class="hidden-tablet">Comment</span></a></li>
                            
                        
                                    </ul>
                    </div>
                </div>
                <!-- end: Main Menu -->


                <!-- start: Content -->
                <div id="content" class="span10">
                    <?php 
                    if ($_SESSION['access_level']==1) {
                        
                    
                        if(isset($page) == NULL) {
                            include './admin_dashboard.php';
                        }
                        else if($page == 'category') {
                            include 'add_category.php';
                        }
                        else if($page == 'sharif') {
                            include 'manage_category_content.php';
                        }
                        
                        else if($page == 'view_content') {
                            include 'view_content.php';
                        }
                        else if($page == 'category_edit') {
                            include 'edit_category_content.php';
                        }
                        else if($page == 'news') {
                            include '../admin/pages/article.php';
                        }
                        else if($page == 'post') {
                            include '../admin/pages/manage_article.php';
                        }
                        else if($page == 'post_view') {
                            include '../admin/pages/view_post.php';
                        }  
                        else if($page == 'post_edit') {
                            include '../admin/pages/post_edit.php';
                        }  
                        else if($page == 'trash') {
                            include '../admin/pages/article_trash.php';
                        }  
                        else if($page == 'ad') {
                            include '../admin/ad/advertise.php';
                        } 
                        else if($page == 'manage_ad') {
                            include '../admin/ad/manage_advertise.php';
                        } 
                        else if($page == 'edit_ad') {
                            include '../admin/ad/edit_advertise.php';
                        } 
                                                else if($page == 'ad_view') {
                            include '../admin/ad/advertise_view.php';
                        }   else if($page == 'option') {
                            include '../admin/pages/option.php';
                        } 
                        else if($page == 'comment') {
                            include '../admin/pages/manage_comment.php';
                        } else if($page == 'user') {
                            include '../admin/pages/manage_users.php';
                        } else if($page == 'admin') {
                            include '../admin/pages/manage_admin.php';
                        } else if($page == 'video') {
                            include '../admin/pages/videos.php';
                        } 
}elseif ($_SESSION['access_level']==2) {
                        if(isset($page) == NULL) {
                            include './admin_dashboard.php';
                        }
                        else if($page == 'category') {
                            include 'add_category.php';
                        }
                        else if($page == 'sharif') {
                            include 'manage_category_content.php';
                        }
                        
                        else if($page == 'view_content') {
                            include 'view_content.php';
                        }else if($page == 'news') {
                            include '../admin/pages/article.php';
                        }
                        
                        echo 'not permitted';
                    }
                    ?>
                </div><!--/.fluid-container-->

                <!-- end: Content -->
            </div><!--/#content.span10-->
        </div><!--/fluid-row-->

        <div class="modal hide fade" id="myModal">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">Ã—</button>
                <h3>Settings</h3>
            </div>
            <div class="modal-body">
                <p>Here settings can be configured...</p>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn" data-dismiss="modal">Close</a>
                <a href="#" class="btn btn-primary">Save changes</a>
            </div>
        </div>

        <div class="clearfix"></div>

        <footer>

            <p>
                <span style="text-align:left;float:left">&copy; 2013 <a href="http://jiji262.github.io/Bootstrap_Metro_Dashboard/" alt="Bootstrap_Metro_Dashboard">Bootstrap Metro Dashboard</a></span>

            </p>

        </footer>

        <!-- start: JavaScript-->

        <script src="js/jquery-1.9.1.min.js"></script>
        <script src="js/jquery-migrate-1.0.0.min.js"></script>

        <script src="js/jquery-ui-1.10.0.custom.min.js"></script>

        <script src="js/jquery.ui.touch-punch.js"></script>

        <script src="js/modernizr.js"></script>

        <script src="js/bootstrap.min.js"></script>

        <script src="js/jquery.cookie.js"></script>

        <script src='js/fullcalendar.min.js'></script>

        <script src='js/jquery.dataTables.min.js'></script>

        <script src="js/excanvas.js"></script>
        <script src="js/jquery.flot.js"></script>
        <script src="js/jquery.flot.pie.js"></script>
        <script src="js/jquery.flot.stack.js"></script>
        <script src="js/jquery.flot.resize.min.js"></script>

        <script src="js/jquery.chosen.min.js"></script>

        <script src="js/jquery.uniform.min.js"></script>

        <script src="js/jquery.cleditor.min.js"></script>

        <script src="js/jquery.noty.js"></script>

        <script src="js/jquery.elfinder.min.js"></script>

        <script src="js/jquery.raty.min.js"></script>

        <script src="js/jquery.iphone.toggle.js"></script>

        <script src="js/jquery.uploadify-3.1.min.js"></script>

        <script src="js/jquery.gritter.min.js"></script>

        <script src="js/jquery.imagesloaded.js"></script>

        <script src="js/jquery.masonry.min.js"></script>

        <script src="js/jquery.knob.modified.js"></script>

        <script src="js/jquery.sparkline.min.js"></script>

        <script src="js/counter.js"></script>

        <script src="js/retina.js"></script>

        <script src="js/custom.js"></script>
        
        <!-- end: JavaScript-->

    </body>
</html>
