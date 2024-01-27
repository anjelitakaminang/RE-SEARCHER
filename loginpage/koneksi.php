<?php
$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "researcherdb";

$koneksi = mysqli_connect($host,$user,$pass,$db);
if(!$koneksi){
    die("Opps, kamu gagal terkoneksi!");
}
?>