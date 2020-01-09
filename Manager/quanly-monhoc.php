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
$output .='<table class ="table table-bordered table-triped">
<tr>
   <th>Thứ tự</th>
   <th>Tên Môn</th>
   <th>Tên ngành</th>
   <th>Sửa</th>
   <th>Xóa</th>
</tr>
';
if($number_of_rows>0){
    $count = 0;
    while($row = mysqli_fetch_array($result)){
        $count ++;
        $output.='<tr>
            <td>'.$count.'</td>
            <td>'.$row['tenmon'].'</td>
            <td>'.$row['tennganh'].'</td>
            <td><button type="button"  class="btn btn-warning btn-xs edit " id="'.$row['mamon'].'">Cập nhật</button></td>
            <td><button type="button"  class="btn btn-danger btn-xs del " id="'.$row['mamon'].'">Bay màu</button></td>
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