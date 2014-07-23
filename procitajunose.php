<?php

include_once('konektor.php');

$procitajzapise = mysql_query("SELECT * FROM naopako WHERE objavljeno=1");


while ($unos = mysql_fetch_array($procitajzapise)) {
	$unos{'id'};
	$unos{'timestamp'};
	$unos{'opis'};
	$unos{'tacno'}
	$unos{'netacno'}
	$unos{'objavljeno'}
	
	// Formiranje prikaza




}

//close the connection
mysql_close($link);

?>