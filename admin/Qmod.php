<?php include '../skin.inc.php'; ?>
<?php
if(isset($_GET['Qname'])){
$req = mysql_query("SELECT * FROM `Q` WHERE id={$_GET['Qid']}");
$count = mysql_num_rows($req);
if($count!=0){
$req = mysql_query("UPDATE `Q` SET `Q` = '".addslashes($_GET['Qname'])."' WHERE id={$_GET['Qid']}");
echo "<h3>Renamed Question</h3>";
}else{
echo '<h3>Error, this question does not seem to be in the database</h3>';
}}

if(isset($_GET['Qmod'])){
$req = mysql_query("SELECT * FROM `Q` WHERE id={$_GET['Qmod']}");
$count = mysql_num_rows($req);
if($count!=0){
while($_ITEM=mysql_fetch_array($req)){
echo '<form action="Qmod.php"><input type="hidden" name="Qid" value ="';
echo $_ITEM['id'];
echo '">New text: <input type="text" name="Qname" value="';
echo $_ITEM['Q'];
echo '"><input type="submit" value="Save"></form>';
}
}else{
echo '<h3>Error, this question does not seem to be in the database</h3>';
}
}else{
$req=mysql_query("SELECT * FROM `Q`");
while($_ITEM=mysql_fetch_array($req)){
echo '<a href="Qmod.php?Qmod=';
echo $_ITEM['id'];
echo '">Rewrite the question"';
echo $_ITEM['Q'];
echo '"</a><br>';
}
}
?>
<br><a href="index.php">Back</a>
<?php include '../bas.inc.php'; ?>