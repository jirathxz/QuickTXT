<?php

session_start();
header("Content-type: text/plain");
header("Content-Disposition: attachment; filename=".$_SESSION['product']." FROM jirathxQuickShop.txt");

print $_SESSION['txt'];
?> 