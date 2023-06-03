<?php
if (@$_SESSION['level']=='1') {
    include 'dashboard.php';
}else{
    include 'kos.php';
}
?>