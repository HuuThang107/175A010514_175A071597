<?php



require_once ("../includes/connection.php");
$query = "SELECT * FROM nganhhoc ORDER BY manganh DESC";
$result = mysqli_query($conn, $query);

//Them du lieu
if(isset($_POST['tenmon']))
{
    $tenmon = $_POST['tenmon'];
    $nganh = $_POST['nganh'];
    $insert = "INSERT INTO monhoc(tenmon,nganh) VALUES ('$tenmon','$nganh') ";
    $ins = mysqli_query($conn,$insert);

}


//Sua du lieu



//Xoa du lieu

if(isset($_POST['newID'])) {
    $id = $_POST['newID'];
    $delete = "DELETE FROM monhoc WHERE mamon ='$id'  ";
    $del = mysqli_query($conn, $delete);
}
//load du lieu
$query = "SELECT tenmon,mamon,tennganh FROM monhoc,nganhhoc where monhoc.nganh = nganhhoc.manganh ";
$result = mysqli_query($conn, $query);
$number_of_rows = mysqli_num_rows($result);
$output = '';
$output .='<table class ="table table-bordered table-triped" style="width :900px; margin-left: 100px; margin-top: 20px">
<tr>
   <td align = "center">Thứ tự</td>
   <td align = "center">Tên Môn</td>
   <td align = "center">Tên ngành</td>
   <td align = "center">Sửa</td>
   <td align = "center">Xóa</td>
</tr>
';
if($number_of_rows>0){
    $count = 0;
    while($row = mysqli_fetch_array($result)){
        $count ++;
        $output.='<tr>
            <td align = "center">'.$count.'</td>
            <td align = "center">'.$row['tenmon'].'</td>
            <td align = "center">'.$row['tennganh'].'</td>
            <td align = "center"><button type="button"  class="btn btn-warning btn-xs edit " id="'.$row['mamon'].'">Cập nhật</button></td>
            <td align = "center"><button type="button"  class="btn btn-danger btn-xs del " id="'.$row['mamon'].'">Bay màu</button></td>
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