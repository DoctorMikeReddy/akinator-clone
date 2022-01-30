<?php include '../skin.inc.php'; ?>
<?php
if(isset($_GET['Rdelete'])){
$req = mysql_query("SELECT * FROM `item` WHERE id={$_GET['Rdelete']}");
$count = mysql_num_rows($req);
if($count!=0){
mysql_query('DELETE FROM `item` where id='.$_GET['Rdelete']);
mysql_query('DELETE FROM `R` where id='.$_GET['Rdelete']);
echo '<h3>Remove Object</h3>';
}else{
echo '<h3>Error, the object does not appear to be in the database</h3>';
}
}else{
$req=mysql_query("SELECT * FROM `item`");
while($_ITEM=mysql_fetch_array($req)){
echo '<a href="Rdelete.php?Rdelete=';
echo $_ITEM['id'];
echo '">Remove the object"';
echo $_ITEM['name'];
echo '"</a><br>';
}
}
?>
<br><a href="index.php">Back</a>
<?php include '../bas.inc.php'; ?>