<?php
session_start();
unset($_SESSION['admin_login']);
unset($_SESSION['admin_email']);
session_destroy();
echo "<script>window.location.href='login.php'</script>";

?>