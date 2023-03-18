<?php
    require_once '../../connect.php';

    session_start();
    session_destroy();
    echo "<script>window.location.href='../../';</script>";
?>