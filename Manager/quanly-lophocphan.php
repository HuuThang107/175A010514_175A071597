<?php

require_once("../includes/connection.php");
//select du lieu
if (isset($_POST['mamon'])){
    $id = $_POST['mamon'];
    $query = "SELECT tengv,giaovien_mon.magv FROM giaovien,giaovien_mon WHERE giaovien_mon.mamon ='$id' and giaovien_mon.magv = giaovien.magv";
    $result = mysqli_query($conn, $query);
    $output = '';
    $output = '<option>-----------Chọn giáo viên----------</option>';
    while ($row = mysqli_fetch_array($result)){
        $output.='<option value = "'.$row['magv'].'">'.$row['tengv'].'</option>';
    }
    echo $output;
}

//Them du lieu
if (isset($_POST['tenlophocphan'])) {
    $tenlophocphan = $_POST['tenlophocphan'];
    $mamon = $_POST['mamon'];
    $magv = $_POST['magv'];
    $namhoc = $_POST['namhoc'];
    $hocki = $_POST['hocki'];
    $giaidoan = $_POST['giaidoan'];
    $insert = "INSERT INTO lophocphan(tenlophocphan,mamon,magv,namhoc,hocki,giaidoan) VALUES ('$tenlophocphan','$mamon','$magv','$namhoc','$hocki','$giaidoan') ";
    $ins = mysqli_query($conn, $insert);

}




//Xoa du lieu

if (isset($_POST['newID'])) {
    $id = $_POST['newID'];
    $delete = "DELETE FROM lophocphan WHERE malophocphan ='$id' ";
    $del = mysqli_query($conn, $delete);
}


//Load du lieu
$query = "SELECT malophocphan,tenlophocphan,tenmon,tengv,namhoc,hocki,giaidoan FROM lophocphan,giaovien,monhoc where lophocphan.mamon=monhoc.mamon and lophocphan.magv=giaovien.magv";
$result = mysqli_query($conn, $query);
$number_of_rows = mysqli_num_rows($result);
$output = '';
$output .= '<table class ="table table-bordered table-triped" style = "width : 900px; margin-left: 150px">
<tr>
   <td align = "center">Thứ tự</td>
   <td align = "center">Tên Lớp học phần</td>
   <td align = "center">Tên môn</td>
   <td align = "center">Tên giáo viên phụ trách</td>
   <td align = "center">Năm học</td>
   <td align = "center">Học kì</td>
   <td align = "center">Giai đoạn</td>
   <td align = "center">Sửa</td>
   <td align = "center">Xóa</td>
</tr>
';
if ($number_of_rows > 0) {
    $count = 0;
    while ($row = mysqli_fetch_array($result)) {
        $count++;
        $output .= '<tr>
            <td align = "center">' . $count . '</td>
            <td align = "center">' . $row['tenlophocphan'] . '</td>
            <td align = "center">' . $row['tenmon'] . '</td>
            <td align = "center">' . $row['tengv'] . '</td>
            <td align = "center">' . $row['namhoc'] . '</td>
            <td align = "center">' . $row['hocki'] . '</td>
            <td align = "center">' . $row['giaidoan'] . '</td>
            <td align = "center"><button type="button"  class="btn btn-warning btn-xs edit " id="' . $row['malophocphan'] . '">Cập nhật</button></td>
            <td align = "center"><button type="button"  class="btn btn-danger btn-xs del " id="' . $row['malophocphan'] . '">Bay màu</button></td>
</tr>';
    }
} else {
    $output .= '<tr>
            <td colspan="9" align="center">Chưa có dữ liệu</td>
</tr>';
}
$output .= '</table>';
echo $output;
?>
