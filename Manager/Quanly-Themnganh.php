<?php
require_once ("../includes/connection.php");

if(isset($_POST["tennganh"]))
{
    $tennganh = $_POST["tennganh"];
    $mota = $_POST["mota"];


    $query = '';

    for($count = 0; $count<count($tennganh); $count++)
    {
        $tenn = mysqli_real_escape_string($conn, $tennganh[$count]);//Xu ly loi nhung ki tu dac biet nhu ",',/
        $mt = mysqli_real_escape_string($conn, $mota[$count]);
    }


    if($tenn != '' && $mt != '' ) {
        $query .= '
   INSERT INTO nganhhoc(tennganh,mota) 
   VALUES("' . $tenn . '", "' . $mt . '"); 
   ';

    }
    if($query != '')
    {
        if(mysqli_query($conn, $query))
        {
            echo 'Đã thêm dữ liệu';
        }
        else
        {
            echo 'Lỗi';
        }
    }

}
?>
