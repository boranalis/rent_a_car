<?php

$host = "localhost";
$kadi = "root";
$sifre = "";
$veritabani ="arackiralama";

$baglanti = new mysqli($host, $kadi, $sifre, $veritabani);

if ($baglanti->connect_error) {
  die("Bağlantı kurulamadı: " . $baglanti->connect_error);
}

?>