<?php
function antiinjection($koneksi, $data){
    return pg_escape_string($koneksi, trim($data));
}
?>
