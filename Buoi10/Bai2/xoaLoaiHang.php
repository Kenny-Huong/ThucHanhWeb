<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xóa Loại Hãng</title>
</head>

<body>
    <h2>Xóa Loại Hãng</h2>

    <form action="" method="post">
        Mã loại: <input type="text" name="Ma_loai" required><br>
        <input type="submit" value="Xóa" name="xoa">
        <button type="button" onclick="history.back()">Hủy</button>
    </form>

    <?php
    // Tạo kết nối
    $conn = new mysqli('localhost:3366', 'root', '', 'ql_ban_sua');

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Xử lý yêu cầu xóa
    if (isset($_POST['xoa'])) {
        $MaLoai = $_POST['Ma_loai'];

        // Xóa loại hãng
        $sql = "DELETE FROM HANG_SUA WHERE Ma_hang_sua='$MaLoai'";

        if ($conn->query($sql) === TRUE) {
            echo "Xóa thành công!";
        } else {
            echo "Lỗi xóa: " . $conn->error;
        }
    }

    // Đóng kết nối
    $conn->close();
    ?>
</body>
</html>
