<?php
session_start();
echo "Please wait as we log you out...";

session_destroy();
header("Location:index.php")

?>