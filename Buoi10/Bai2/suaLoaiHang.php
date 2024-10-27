<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Loại Hàng</title>
</head>

<body>
    <h2>SỬA LOẠI HÀNG</h2>

    <form action="" method="post">
        Mã loại: <input type="text" name="Ma_loai" required><br>
        Tên loại: <input type="text" name="Ten_loai" required><br>
        <input type="submit" value="sua" name="sua">
        <button type="button" onclick="history.back()">Hủy</button>
        <button type="button" onclick="window.location.href='xoaLoaiHang.php'">Xóa Loại Hãng</button>
    </form>
    
<?php
    // Tạo kết nối
    $conn = new mysqli('localhost:3366', 'root', '', 'ql_ban_sua');

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Xử lý cập nhật sinh viên
    if (isset($_POST['sua'])) {
        $MaLoai = $_POST['Ma_loai'];
        $TenLoai = $_POST['Ten_loai'];

        // Cập nhật thông tin sinh viên
        $sql = "UPDATE HANG_SUA SET Ten_hang_sua='$TenLoai' WHERE Ma_hang_sua='$MaLoai'";

        if ($conn->query($sql) === TRUE) {
            echo "Cập nhật thành công!";
        } else {
            echo "Lỗi cập nhật: " . $conn->error;
        }
    }
    ?>
</body>
</html>