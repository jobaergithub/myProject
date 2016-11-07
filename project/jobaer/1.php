<?php require_once 'classes/db_connect.php';
$db_connect=new Db_Connect();
$sql="SELECT * FROM tbl_category";
        $query=mysql_query($sql);
        //$row=  mysql_fetch_assoc($all_news_select_result);
//        echo '<pre>';
//        print_r($row);
//        exit();
?>
<?php




$dom = new domDocument;

    /*** make the output tidy ***/
    $dom->formatOutput = true;

    /*** create the root element ***/
	 
    $root = $dom->appendChild($dom->createElement( "pages"));
    
    /*** create the simple xml element ***/
    $t = simplexml_import_dom( $dom );
    while ($row = mysql_fetch_assoc($query)) {
    $sxe=$t->addChild("link");
    $v='http://tarek1862.net84.net/category.php?category_id='.$row['category_id'];
    $z=$row['category_name'];
    /*** add a firstname element ***/
    $sxe->addChild("title", "$z");

    /*** add a surname element ***/
    $sxe->addChild("url", "$v");
	
    /*** echo the xml ***/
   //echo $sxe->asXML(); 


$string_value=$dom->saveXML();
}
$dom->save("tarek.xml");
echo 'good';