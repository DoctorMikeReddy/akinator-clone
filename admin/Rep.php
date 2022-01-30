<?php include '../skin.inc.php';
if (isset($_POST['RID'])){
$req = mysql_query("SELECT id FROM `Q` ORDER BY `id` DESC LIMIT 0 , 1");
$MAX = mysql_fetch_array($req);
$MAX = $MAX['id'];
foreach($_POST AS $Q =>$R){
if(is_numeric($Q) && ( $R == 0 OR $R == 1 OR $R==2) ){
if(!($Q<0) AND !($Q>$MAX)){
$req = mysql_query("SELECT * FROM `R` WHERE id={$_POST['RID']} AND Q={$Q}");
$count = mysql_num_rows($req);
if($count==1){
// UPDATE
mysql_query("UPDATE `R` SET `R` = '{$R}' WHERE id={$_POST['RID']} AND Q={$Q};");
}else{
// INSERT
mysql_query("INSERT INTO `R` (`id`, `Q`, `R`) VALUES ('{$_POST['RID']}', '{$Q}', '{$R}')");
}
}}}
echo '<h3>Updates!</h3>';
}
if(isset($_GET['Rid'])){
$req = mysql_query("SELECT * FROM `item` WHERE id={$_GET['Rid']}");
$NAME = mysql_fetch_array($req);
$NAME = $NAME['name'];
$count = mysql_num_rows($req);
if($count!=0){

$Q_old = mysql_query("SELECT * FROM `R` WHERE id={$_GET['Rid']}");
$compte = mysql_num_rows($Q_old);
if($count!=0){
while($MFA=mysql_fetch_array($Q_old)){
$R_OLD[$MFA['Q']]=$MFA['R'];
}}
?><h1>Answers "<?php echo $NAME; ?>"</h1>
<form action="Rep.php" method="post">
<table border=1>
<tr><th>QUESTION</th><th width=75>Yes</th><th width=75>No</th><th width=75>It depends</th></tr>

<?php
$req=mysql_query("SELECT * FROM `Q`");
while($_ITEM=mysql_fetch_array($req)){
echo '<tr><td align="right"';
if(!isset($R_OLD[$_ITEM['id']]))echo ' color="red" ';
echo '>'.$_ITEM['Q'];
if(!isset($R_OLD[$_ITEM['id']]))echo '</font>';
echo '</td><td align="center"><input name="'.$_ITEM['id'].'" value="1" type="radio" ';
if(isset($R_OLD[$_ITEM['id']]) && $R_OLD[$_ITEM['id']]==1){echo 'checked';}
echo '></td><td align="center">';
echo '<input name="'.$_ITEM['id'].'" value="0" type="radio" ';
if(isset($R_OLD[$_ITEM['id']]) && $R_OLD[$_ITEM['id']]==0){echo 'checked';}
echo '></td><td align="center">';
echo '<input name="'.$_ITEM['id'].'" value="2" type="radio" ';
if(isset($R_OLD[$_ITEM['id']]) && $R_OLD[$_ITEM['id']]==2){echo 'checked';}
echo '></td>';
echo '</tr>';
}
echo '</table>';
?>
<br><input type="submit" value="Save">
<input type="hidden" name="RID" value="<?php echo $_GET['Rid']; ?>">
</form>

<?php
}else{
echo 'Error. the object does not appear to be in the database';
}
}else{
$req=mysql_query("SELECT * FROM `item`");
while($_ITEM=mysql_fetch_array($req)){
$NB=mysql_query("SELECT * FROM `R` WHERE id='{$_ITEM['id']}'");
$NB=mysql_num_rows($NB);

echo '<a href="Rep.php?Rid=';
echo $_ITEM['id'];
echo '"';
if($NB!=C_QUEST)echo ' style="color:red;"';
echo '>Modify object responses "';
echo $_ITEM['name'];
echo '"</a><br>';
}
}
?>
<br><a href="index.php">Back</a>
<?php include '../bas.inc.php'; ?>