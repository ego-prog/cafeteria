<?php
if (!isset($_SESSION)) {
    session_start();
}
(!isset($_SESSION['user'])) ? header("location:login.php") : "";
print_r($_SESSION);
?>
