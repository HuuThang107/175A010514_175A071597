<?php
//insert.php
require_once ("../includes/connection.php");

if(isset($_POST["tengv"]))
{
    $tengv = $_POST["tengv"];
    $diachi = $_POST["diachi"];
    $sdt = $_POST["sdt"];

    $query = '';

    for($count = 0; $count<count($tengv); $count++)
    {
        $ten = mysqli_real_escape_string($conn, $tengv[$count]);//Xu ly loi nhung ki tu dac biet nhu ",',/
        $dc = mysqli_real_escape_string($conn, $diachi[$count]);
        $dt = mysqli_real_escape_string($conn, $sdt[$count]);
    }


        if($ten != '' && $dc != '' && $dt != '' ) {
            $query .= '
   INSERT INTO giaovien(tengv,diachi,sdt) 
   VALUES("' . $ten . '", "' . $dc . '", "' . $dt . '"); 
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