<?php

include("db.php");

mysqli_query($conn, "UPDATE slots SET status='Vacant'");

echo "<script>
alert('All slots reset successfully');
window.location='dashboard.php';
</script>";

?>