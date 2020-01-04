<?php
require_once ("../includes/connection.php");

if(isset($_POST['hidden_id']))
{
    $name = $_POST['tengv'];
    $address = $_POST['diachi'];
    $phones = $_POST['sdt'];
    $id = $_POST['hidden_id'];
    for($count = 0; $count < count($id); $count++)
    {
        $data = array(
            ':tengv'   => $name[$count],
            ':diachi'  => $address[$count],
            ':sdt'  => $phones[$count],
            ':id'   => $id[$count]
        );
        $query = "
  UPDATE giaovien
  SET tengv = :tengv, diachi = :diachi, sdt = :sdt
  WHERE id = :id
  ";
        $statement = $conn->prepare($query);
        $statement->execute($data);
    }
}
?>
