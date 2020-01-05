<?php
require_once '../includes/connection.php';

if(isset($_POST['id'])) {
    $id = $_POST['id'];

    $delete = "DELETE FROM giaovien WHERE magv ='$id' ";
    $del = mysqli_query($conn, $delete);
}
?>
