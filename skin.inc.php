<?php
function vide_sess(){
unset($_SESSION);
}
$url_base="http://localhost:8888/akinator";
session_start();
$db = mysqli_connect('localhost','root','root') ;
mysqli_select_db('DATABASE',$db);
$req=mysql_query("SELECT COUNT(*) AS count FROM `Q`");
//$_ITEM=mysql_fetch_array($req);
//DEFINE("C_QUEST",$_ITEM['count']);

//$req=mysql_query("SELECT COUNT(*) AS count FROM `item`");
//$_ITEM=mysql_fetch_array($req);
//DEFINE("C_WORDS",$_ITEM['count']);

//function secure($str){return trim(htmlentities($str, ENT_QUOTES));}
//function s($i) { return ($i>1) ? 's' : '' ; }

?>
<link href="<?php echo $url_base; ?>/style.css" rel="stylesheet" type="text/css" />