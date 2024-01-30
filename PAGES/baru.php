<?php
session_start();
session_destroy();
header('location: grading.html');
exit();
?>