<?php
require_once ("../includes/connection.php");

if(isset($_POST['magv']))
{
    $name = $_POST['tengv'];
    $address = $_POST['diachi'];
    $phones = $_POST['sdt'];
    $id = $_POST['magv'];
    for($count = 0; $count < count($id); $count++)
    {
        $data = array(
            ':tengv'   => $name[$count],
            ':diachi'  => $address[$count],
            ':sdt'  => $phones[$count],
            ':magv'   => $id[$count]
        );
        $query = "
  UPDATE giaovien
  SET tengv = :tengv, diachi = :diachi, sdt = :sdt
  WHERE magv = :magv
  ";
        $result = mysqli_query($conn, $query);
    }
}
?>
