<link rel="stylesheet" href="css/naopakestv.css" />

<?php

/* Kreirano u Hocu Sajt
 * https://www.facebook.com/hocu.sajt.danas
 * 
 * Konektor na bazu 
 */

// Opcije


$db_server = 'localhost';
$db_korisnik = 'nusrb';
$db_lozinka = '654654qQ';
$db_naziv = 'nus';

$err_otv_tag = '<center><h1 class="greska">';
$err_ztv_tag = '</h1></center>';

$por_nsmpovnsrv = 'Nisam povezan na server sa bazom usled : ';
$por_nmgdkordb = 'Ne mogu da koristim bazu usled: ';

// Povezivanje na server i bazu sa proverom grešaka
$link = mysql_connect($db_server, $db_korisnik, $db_lozinka);		if (!$link)				{ die ($err_otv_tag . $por_nsmpovnsrv . mysql_error() . $err_ztv_tag); }
$odabirBaze = mysql_select_db($db_naziv, $link);					if (!$odabirBaze)		{ die ($err_otv_tag . $por_nmgdkordb . mysql_error() . $err_ztv_tag); }
mysql_query("SET NAMES 'utf8'", $link);

?>
<link rel="stylesheet" href="css/naopakestv.css" />