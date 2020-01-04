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
        $tengv_clean = mysqli_real_escape_string($conn, $tengv[$count]); //Xử lý biến trước khi thực hiện query
        $diachi_clean = mysqli_real_escape_string($conn, $diachi[$count]);
        $sdt_clean = mysqli_real_escape_string($conn, $sdt[$count]);
        if($tengv_clean != '' && $diachi_clean != '' && $sdt_clean != '' )
        {
            $query .= '
   INSERT INTO giaovien(tengv,diachi,sdt) 
   VALUES("'.$tengv_clean.'", "'.$diachi_clean.'", "'.$sdt_clean.'"); 
   ';
        }
    }
    if($query != '')
    {
        if(mysqli_multi_query($conn, $query))//Thực hiện nhiều câu truy vấn với database
        {
            echo 'Thêm thành công';
        }
        else
        {
            echo 'Lỗi';
        }
    }
    else
    {
        echo 'Tất cả bản ghi thêm thành công';
    }
}
?>