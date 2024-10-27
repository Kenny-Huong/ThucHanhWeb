<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập Nhật Sinh Viên</title>
</head>
<body>
    <h2>CẬP NHẬT SINH VIÊN</h2>
    <form action="" method="post">
        <div>
            <label for="maSv">Mã SV :</label>
            <input type="text" name="maSv" id="maSv" required>
        </div>
        <div>
            <label for="ho">Họ đệm:</label>
            <input type="text" name="ho" id="ho">
        </div>
        <div>
            <label for="ten">Tên :</label>
            <input type="text" name="ten" id="ten">
        </div>
        <div>
            <label for="ngaySinh">Ngày sinh :</label>
            <input type="date" name="ngaySinh" id="ngaySinh">
        </div>
        <div>
            <label for="gioiTinh">Giới tính :</label>
            <input type="text" name="gioiTinh" id="gioiTinh">
        </div>
        <div>
            <label for="maKhoa">Khoa :</label>
            <input type="text" name="maKhoa" id="maKhoa">
        </div>
        <input type="submit" name="capnhat" value="Cập Nhật">
        <input type="reset" value="Hủy">
    </form>

    <h2>XÓA SINH VIÊN</h2>
    <form action="" method="post">
        <input type="submit" name="xoasv" value="Xóa SV01 và SV05">
    </form>

    <?php


    // Tạo kết nối
    $conn = new mysqli('localhost:3366', 'root', '', 'qlsv');

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Xử lý cập nhật sinh viên
    if (isset($_POST['capnhat'])) {
        $MaSV = $_POST['maSv'];
        $HoDem = $_POST['ho'];
        $Ten = $_POST['ten'];
        $NgaySinh = $_POST['ngaySinh'];
        $GioiTinh = $_POST['gioiTinh'];
        $MaKhoa = $_POST['maKhoa'];

        // Cập nhật thông tin sinh viên
        $sql = "UPDATE SINHVIEN SET HoDem='$HoDem', Ten='$Ten', NgaySinh='$NgaySinh', GioiTinh='$GioiTinh', MaKhoa='$MaKhoa' WHERE MaSV='$MaSV'";

        if ($conn->query($sql) === TRUE) {
            echo "Cập nhật thành công!";
        } else {
            echo "Lỗi cập nhật: " . $conn->error;
        }
    }

    // Xử lý xóa sinh viên
    if (isset($_POST['xoasv'])) {
        $sql = "DELETE FROM SINHVIEN WHERE MaSV='SV001' OR MaSV='SV005'";

        if ($conn->query($sql) === TRUE) {
            echo "Xóa thành công!";
        } else {
            echo "Lỗi xóa: " . $conn->error;
        }
    }

    $conn->close();
    ?>
</body>
</html>
