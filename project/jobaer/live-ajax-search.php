<html>
<head>
     <style>
        body{
            background-color: #cccccc;        }
        #livesearch a{
            text-decoration: none;
            color: #666;
        }
        #livesearch a:hover{
            text-decoration: none;
            color: #666;
        }
        #livesearch{
            background-color: transparent;
            border: 5px;
        }
        
    </style>
    <script type="text/javascript">
function showResult(str) {
  if (str.length==0) {
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
      document.getElementById("livesearch").style.border="0px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
}
</script>
</head>
<body>

<form>
    <input type="text" size="30" onkeyup="showResult(this.value)" placeholder="Type to Search">
    <div id="livesearch"></div>
</form>

</body>
</html> 