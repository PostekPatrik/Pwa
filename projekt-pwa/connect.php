<?php


$server = 'localhost';
$ime = 'root';
$lozinka = '';
$baza = 'projekt';

$dbc = mysqli_connect($server, $ime, $lozinka, $baza) or die('Ne može se povezati na bazu'.mysqli_connect_error());
mysqli_set_charset($dbc, "utf8");
