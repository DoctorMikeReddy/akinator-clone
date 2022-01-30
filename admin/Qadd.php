<?php include '../skin.inc.php'; ?>
<?php
if(isset($_GET['Q'])){

mysql_query('INSERT INTO `Q` (`Q`) VALUES ("'.addslashes($_GET['Q']).'");');
echo '<h3>Question Addition</h3>';

}else{
?>
<form action="Qadd.php" method="get">
<label>Text:</label><input type="text" name="Q"><br>
<input type="submit" value="Add question">
<?php
}
?>
<br><a href="index.php">Back</a>
<?php include '../bas.inc.php'; ?>