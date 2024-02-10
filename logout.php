<?php
session_start();
session_destroy();
header('location: login.php');
?>

<script type="text/javascript">
    alert('You are out');
    location.href="login.php";
</script>