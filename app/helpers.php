<?php
function rupiah($number){
    $result = "Rp " . number_format($number,0,',','.');
    return $result;
}
?>