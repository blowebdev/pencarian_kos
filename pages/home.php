<?php
if (in_array($_SESSION['level'],array('1','3'))) {
    include 'dashboard.php';
}else{
    include 'kos.php';
}
?>