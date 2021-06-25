<?php
//Stabilim conexiunea cu serverul MySQL
$conexiune = mysqli_connect("localhost", "root", "");

if (!$conexiune) {
die('Eroare conectare la MySQL: ' . mysqli_connect_error());
} 
mysqli_select_db($conexiune, "theCodeNtest") or
die("Eroare la selectarea bazei de date " . mysqli_error($conexiune));
?>