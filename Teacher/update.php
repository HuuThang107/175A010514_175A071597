<?php
require_once ("../includes/connection.php");
if(isset($_POST['masv']))
{
    $id = $_POST['masv'];
    $tensv = $_POST['tensv'];
    $cmt = $_POST['cmt'];
    $diachi = $_POST['diachi'];
    $lop = $_POST['lop'];
    $query = "UPDATE sinhvien SET tensv = '$tensv',cmt = '$cmt',diachi='$diachi',lop ='$lop' where  masv = '$id'" ;
    $result = mysqli_query($conn,$query);
}
if(isset($_POST['id']))
{
    $id = $_POST['id'];
    $trongso = $_POST['trongso'];
    $dcc = $_POST['dcc'];
    $dgk = $_POST['dgk'];
    $dbt = $_POST['dbt'];
    $dth = $_POST['dth'];
    $diemthi = $_POST['diemthi'];
    $query = "UPDATE lop_sinhvien SET trongso = '$trongso',dcc = '$dcc',dgk='$dgk',dbt ='$dbt',dth ='$dth',diemthi ='$diemthi' where id = '$id' " ;
    $result = mysqli_query($conn,$query);
}

?>