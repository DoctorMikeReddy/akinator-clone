<?php include '../skin.inc.php'; ?>
<h2> QUESTIONS :</h2>
<a href="Qadd.php">Add</a> -
<a href="Qmod.php">Rewrite</a> -
<a href="Qdelete.php">Delete</a>

<h2> Objects:</h2>
<a href="Radd.php">Add</a> -
<a href="Rmod.php">Rename</a> -
<a href="Rdelete.php">Delete</a><br><br>
<?php
$NB=mysql_query("SELECT * FROM `R`");
$NB=mysql_num_rows($NB);

//echo $NB.' NB';
//echo C_QUEST.' C_QUEST';
//echo C_WORDS.'C_WORDS';

if($NB != (C_QUEST*C_WORDS) )
echo '<a href="Rep.php" style="color:red;">There are '.((C_QUEST*C_WORDS)-$NB).' Questions that need answers';
else
echo '<a href="Rep.php">Answers</a>'; 


include '../bas.inc.php'; ?>