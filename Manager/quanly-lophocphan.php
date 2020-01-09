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
$output .= '<table class ="table table-bordered table-triped">
<tr>
   <th>Thứ tự</th>
   <th>Tên Lớp học phần</th>
   <th>Tên môn</th>
   <th>Tên giáo viên phụ trách</th>
   <th>Năm học</th>
   <th>Học kì</th>
   <th>Giai đoạn</th>
   <th>Sửa</th>
   <th>Xóa</th>
</tr>
';
if ($number_of_rows > 0) {
    $count = 0;
    while ($row = mysqli_fetch_array($result)) {
        $count++;
        $output .= '<tr>
            <td>' . $count . '</td>
            <td>' . $row['tenlophocphan'] . '</td>
            <td>' . $row['tenmon'] . '</td>
            <td>' . $row['tengv'] . '</td>
            <td>' . $row['namhoc'] . '</td>
            <td>' . $row['hocki'] . '</td>
            <td>' . $row['giaidoan'] . '</td>
            <td><button type="button"  class="btn btn-warning btn-xs edit " id="' . $row['malophocphan'] . '">Cập nhật</button></td>
            <td><button type="button"  class="btn btn-danger btn-xs del " id="' . $row['malophocphan'] . '">Bay màu</button></td>
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
