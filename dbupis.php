<?php

/* Kreirano u Hocu Sajt
 * https://www.facebook.com/hocu.sajt.danas
 * 
 */


$variable = $_GET['unos'];
$variable = 'testiram';






$sql_unos = "INSERT INTO `nus`.`naopako` (`id`, `timestamp`, `opis`, `tacno`, `netacno`, `objavljeno`) VALUES (NULL, NOW(), \'Tekst koji je korisnik prosledio u bazu podataka.\', \'0\', \'0\', \'1\');";








$file = 'unos.txt';

$current = file_get_contents($file);

$current .= $variable."\n";

file_put_contents($file, $current);



?>