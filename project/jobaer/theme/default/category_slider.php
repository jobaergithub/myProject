<?php


$category_id = $_GET['category_id'];

$select_all_news_from_news_id_1= $app_obj->get_images_news($category_id);
$select_all_news_from_news_id_2= $app_obj->get_images_news($category_id);
$row1=mysql_fetch_assoc($select_all_news_from_news_id_2);
//echo '<pre/>';
//print_r($row);
//exit();
?>

                <div class="col-md-7 nopadding">

                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!--                indicator-->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                            <li data-target="#myCarousel" data-slide-to="3"  class="active"></li>
                        </ol>
                        <!--wrapper-->
                        <div class="carousel-inner">
						
						<?php
                while($row=mysql_fetch_assoc($select_all_news_from_news_id_1))
                { 
            ?>
                            <div class="item">
                                <a href="">
                                <img src="admin/<?php echo $row['news_image']; ?>" alt="image" style="max-height: 190px;min-width: 100%;">
                                </a>
                            </div>
							<?php } ?>
                            <div class="item active">
                                <a href="">
                                <img src="admin/<?php echo $row1['news_image']; ?>" alt="image" style="max-height: 190px;min-width: 100%;">
                                </a>
                            </div>
                        </div>
                        <!--controls-->
                        <!-- Controls -->
                        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div>


                </div>