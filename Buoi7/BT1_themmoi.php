<?php
// Kết nối đến cơ sở dữ liệu
$conn = new mysqli("localhost:3366", "root", "", "loai_hang");
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Xử lý thêm mới loại hàng
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $maloai = $_POST['maloai'];
    $tenloai = $_POST['tenloai'];
    $conn->query("INSERT INTO loai_hang (maloai, tenloai) VALUES ('$maloai', '$tenloai')");
    header("Location: BT1_dslh.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm mới loại hàng</title>
</head>
<body>
    <h2>Thêm mới loại hàng</h2>
    <form method="post">
        <label for="maloai">Mã loại:</label>
        <input type="text" name="maloai" id="maloai" required><br><br>
        <label for="tenloai">Tên hàng:</label>
        <input type="text" name="tenloai" id="tenloai" required><br><br>
        <button type="submit">Thêm mới</button>
        <a href="BT1_dslh.php"><button type="button">Hủy</button></a>
    </form>
</body>
</html>

<?php
// Đóng kết nối
$conn->close();
?>
