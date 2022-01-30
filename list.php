<?php include 'skin.inc.php'; 

echo '<br>Oh, you want access to the questions and objects? You\'re lucky :-P<br>
<h1> QUESTIONS</h1><ul>';

$req = mysql_query("SELECT * FROM `Q`");
while($_ITEM = mysql_fetch_array($req)){
echo '<li><strong>'.$_ITEM['Q'].'</strong></li>';
}
echo '</ul>';

echo '<h1>Objets</h1><ul>';

$req = mysql_query("SELECT * FROM `item`");
while($_ITEM = mysql_fetch_array($req)){
echo '<li><strong>'.$_ITEM['name'].'</strong></li>';
}
echo '</ul>';



include 'bas.inc.php'; ?>