<?php
session_start ();
unset($_SESSION['cin']);
header ('location:index.php');
?>
