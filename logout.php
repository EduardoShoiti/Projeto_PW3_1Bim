<?php
session_start();
session_destroy();
header('location: loginAdm.php');
exit();
?>