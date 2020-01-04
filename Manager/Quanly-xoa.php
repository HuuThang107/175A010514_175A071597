<?php
require_once '../includes/connection.php';

$id = $_POST['magv'];
$conn->query("DELETE FROM giaovien WHERE magv ='$id'");
?>
