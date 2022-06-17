<?php

header('Content-Type: text/html; charset=UTF-8');

$server = 'localhost';
$username = 'root';
$password = '';
$basename = 'projekt';

$dbc = mysqli_connect($server, $username, $password, $basename) or die('Ne može se povezati na bazu'.mysqli_connect_error());
mysqli_set_charset($dbc, "utf8");
