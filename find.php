<?php
include 'skin.inc.php'; 
if(isset($_GET['r']) && (isset($_SESSION['find']) OR isset($_GET['rep'])) && $_GET['r']=='Y'){
echo "YES ! I WIN again! :-P";
$rep  = $_SESSION['old_rep'];
$item_name=(isset($_GET['rep']))?secure($_GET['rep']):$_SESSION['find'];
$item =  mysql_fetch_array(mysql_query('SELECT id FROM item WHERE lower(name)="'.strtolower($item_name).'"'));
$item = $item['id'];

foreach($rep AS $question=>$reponse){
if(mysql_num_rows(mysql_query('SELECT yes FROM stats WHERE id='.$item.' AND qid='.$question))!=1){
mysql_query("INSERT INTO stats ('id', 'qid', 'yes', 'no') VALUES ('".$item."', '".$question."', '0', '0');");
}
$champ=($reponse==1)?'yes':'no';

mysql_query('UPDATE stats SET '.$champ.'='.$champ.'+1 WHERE id='.$item.' AND qid='.$question);

}

}elseif(isset($_GET['r']) && isset($_SESSION['find']) && $_GET['r']=='N'){
echo "Eh!? <br> You did not think of ".$_SESSION['find']."? What were you thinking of: <form><input type='text' name='old_rep' value='Object you were thinking of'><input type='submit'></form>";
}elseif(isset($_GET['r']) && isset($_SESSION['find']) && $_GET['r']=='YN' && isset($_GET['old_rep'])){
echo "Thanks for helping me :-)";
$rep  = secure($_GET['old_rep']);
$item =  mysql_query('SELECT id FROM item WHERE lower(name)="'.strtolower($_SESSION['find']).'"');
if(mysql_num_rows($item)==0){
mysql_query('INSERT INTO item (name) VALUES ("'.$rep.'");');
$item=mysql_last_insert_id();
}else{
$item=mysql_fetch_array($item);
$item = $item['id'];
}

foreach($rep AS $question=>$reponse){
if(mysql_num_rows(mysql_query('SELECT yes FROM stats WHERE id='.$item.' AND qid='.$question))!=1){
mysql_query("INSERT INTO stats ('id', 'qid', 'yes', 'no') VALUES ('".$item."', '".$question."', '0', '0');");
}
$champ=($reponse==1)?'yes':'no';

mysql_query('UPDATE stats SET '.$champ.'='.$champ.'+1 WHERE id='.$item.' AND qid='.$question);

}
}

include 'bas.inc.php'; 
?>