<?php

function perkenalan($nama, $salam="Assalamualaikum"){
    echo  $salam.", ";
    echo "Perkenalkan, nama saya ".$nama."<br/>";
    echo "Senang berkenalan dengan Anda<br/>";
}

//memanggil fungsi yang sudah dibuat
perkenalan("Rafi","Hallo");

echo "<hr>";

$saya = "Ailsa";
$ucapanSalam = "Selamat pagi";

//memanggil lagi
perkenalan($saya);
?>