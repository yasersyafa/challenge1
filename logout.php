<?php 
session_start();
session_destroy();
echo "<script>
alert('Log out successfully')
document.location.href='index.php';
</script>";
?>