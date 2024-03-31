<?php
session_start();
session_unset();
session_destroy();
echo "<script>window.open('landing.php','_self')</script>";

?>