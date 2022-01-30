<?php include '../skin.inc.php'; ?>
<?php
if(isset($_GET['Qdelete'])){
$req = mysql_query("SELECT * FROM `Q` WHERE id={$_GET['Qdelete']}");
$count = mysql_num_rows($req);
if($count!=0){
mysql_query('DELETE FROM `Q` where id='.$_GET['Qdelete']);
mysql_query('DELETE FROM `R` where q='.$_GET['Qdelete']);
echo '<h3>Question Removal</h3>';
}else{
echo '<h3>Error, the question does not appear to be in the database</h3>';
}
}else{
$req=mysql_query("SELECT * FROM `Q`");
while($_ITEM=mysql_fetch_array($req)){
echo '<a href="Qdelete.php?Qdelete=';
echo $_ITEM['id'];
echo '">Remove the question "';
echo $_ITEM['Q'];
echo '"</a><br>';
}
}
?>
<br><a href="index.php">Back</a>
<?php include '../bas.inc.php'; ?>