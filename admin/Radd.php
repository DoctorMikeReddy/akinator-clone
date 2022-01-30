<?php include '../skin.inc.php'; ?>
<?php
if(isset($_GET['name'])){

mysql_query('INSERT INTO `item` (`name`) VALUES ("'.addslashes($_GET['name']).'");');
echo '<h3>Add object</h3>';

}else{
?>
<form action="Radd.php" method="get">
<label>Name:</label><input type="text" name="name"><br>
<input type="submit" value="Add object">
<?php
}
?>
<br><a href="index.php">Back</a>
<?php include '../bas.inc.php'; ?>