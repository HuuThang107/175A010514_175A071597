<?php
require_once ("../includes/connection.php");


//Them du lieu
if(isset($_POST['tennganh']))
{
    $tennganh = $_POST['tennganh'];
    $mota = $_POST['mota'];
    $insert = "INSERT INTO nganhhoc(tennganh,mota) VALUES ('$tennganh','$mota') ";
    $ins = mysqli_query($conn,$insert);

}


//Sua du lieu
if(isset($_POST['manganh']))
{
    $id = $_POST['manganh'];
    $query = "SELECT * FROM nganhhoc where manganh = '$id'";
    $result = mysqli_query($conn,$query);
    while ($row = mysqli_fetch_array($result)){
        $output['tennganh'] = $row['tennganh'];
        $output['mota'] = $row['mota'];
    }
    echo json_encode($output);
}
//Xoa du lieu

if(isset($_POST['newID'])) {
    $id = $_POST['newID'];
    $delete = "DELETE FROM nganhhoc WHERE manganh ='$id' ";
    $del = mysqli_query($conn, $delete);
}


//Load du lieu
$query = "SELECT * FROM nganhhoc";
$result = mysqli_query($conn, $query);
$number_of_rows = mysqli_num_rows($result);
$output = '';
$output .='<table class ="table table-bordered table-triped" style = "width : 900px ; margin-left: 200px">
<tr>
   <td align = "center" width = "200px">Thứ tự</td>
   <td align = "center" width = "200px">Tên Ngành</td>
   <td align = "center" width = "200px">Mô tả</td>
   <td align = "center" width = "70px">Sửa</td>
   <td align = "center" width = "70px">Xóa</td>
</tr>
';
if($number_of_rows>0){
    $count = 0;
    while($row = mysqli_fetch_array($result)){
        $count ++;
        $output.='<tr>
            <td align = "center">'.$count.'</td>
            <td align = "center">'.$row['tennganh'].'</td>
            <td align = "center">'.$row['mota'].'</td>
            <td align = "center"><button type="button"  class="btn btn-warning btn-xs edit " id="'.$row['manganh'].'">Cập nhật</button></td>
            <td align = "center"><button type="button"  class="btn btn-danger btn-xs del " id="'.$row['manganh'].'">Bay màu</button></td>
</tr>';
    }
}
else{
    $output.='<tr>
            <td colspan="5" align="center">Chưa có dữ liệu</td>
</tr>';
}
$output.='</table>';
echo $output;

?>
