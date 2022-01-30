<?php include '../skin.inc.php'; ?>
<?php
if(isset($_GET['Rname'])){
$req = mysql_query("SELECT * FROM `item` WHERE id={$_GET['Rid']}");
$count = mysql_num_rows($req);
if($count!=0){
$req = mysql_query("UPDATE `item` SET `name` = '".addslashes($_GET['Rname'])."' WHERE id={$_GET['Rid']}");
echo "<h3>Renamed Object</h3>";
}else{
echo '<h3>Error, this object does not seem to be in the database</h3>';
}}

if(isset($_GET['Rmod'])){
$req = mysql_query("SELECT * FROM `item` WHERE id={$_GET['Rmod']}");
$count = mysql_num_rows($req);
if($count!=0){
while($_ITEM=mysql_fetch_array($req)){
echo '<form action="Rmod.php"><input type="hidden" name="Rid" value ="';
echo $_ITEM['id'];
echo '">New name: <input type="text" name="Rname" value="';
echo $_ITEM['name'];
echo '"><input type="submit" value="Send"></form>';
}
}else{
echo '<h3>Error, this object does not seem to be in the database</h3>';
}
}else{
$req=mysql_query("SELECT * FROM `item`");
while($_ITEM=mysql_fetch_array($req)){
echo '<a href="Rmod.php?Rmod=';
echo $_ITEM['id'];
echo '">Rename the object"';
echo $_ITEM['name'];
echo '"</a><br>';
}
}
?>
<br><a href="index.php">Back</a>
<?php include '../bas.inc.php'; ?>