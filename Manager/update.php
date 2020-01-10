<?php
require_once ("../includes/connection.php");
if(isset($_POST['manganh']))
{
    $id = $_POST['manganh'];
    $tennganh = $_POST['tennganh'];
    $mota = $_POST['mota'];
    $query = "UPDATE nganhhoc SET tennganh = '$tennganh',mota ='$mota' where manganh = '$id'" ;
    $result = mysqli_query($conn,$query);
}

if(isset($_POST['mamon']))
{
    $id = $_POST['mamon'];
    $tenmon = $_POST['tenmon'];
    $nganh = $_POST['nganh'];
    $query = "UPDATE monhoc SET tenmon = '$tenmon',nganh ='$nganh' where mamon = '$id'" ;
    $result = mysqli_query($conn,$query);
}
if(isset($_POST['magv']))
{
    $id = $_POST['magv'];
    $tengv = $_POST['tengv'];
    $diachi = $_POST['diachi'];
    $sdt = $_POST['sdt'];
    $query = "UPDATE giaovien SET tengv = '$tengv',diachi='$diachi',sdt ='$sdt' where  magv = '$id'" ;
    $result = mysqli_query($conn,$query);
}
if(isset($_POST['malophocphan']))
{
    $id = $_POST['malophocphan'];
    $tenlophocphan = $_POST['tenlophocphan'];
    $mamon = $_POST['mamon'];
    $magv = $_POST['magv'];
    $namhoc = $_POST['namhoc'];
    $hocki = $_POST['hocki'];
    $giaidoan = $_POST['giaidoan'];
    $query = "UPDATE lophocphan SET tenlophocphan = '$tenlophocphan',mamon='$mamon',magv ='$magv',namhoc ='$namhoc', hocki ='$hocki', giaidoan ='$giaidoan' where  malophocphan = '$id'" ;
    $result = mysqli_query($conn,$query);
}

?>