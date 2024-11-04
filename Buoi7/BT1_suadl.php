<?php
// Kết nối đến cơ sở dữ liệu
$conn = new mysqli("localhost:3366", "root", "", "loai_hang");
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy thông tin loại hàng theo ID
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM loai_hang WHERE id = $id");
$row = $result->fetch_assoc();

// Xử lý cập nhật loại hàng
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $maloai = $_POST['maloai'];
    $tenloai = $_POST['tenloai'];
    $conn->query("UPDATE loai_hang SET maloai = '$maloai', tenloai = '$tenloai' WHERE id = $id");
    header("Location: BT1_dslh.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa loại hàng</title>
</head>
<body>
    <h2>Sửa loại hàng</h2>
    <form method="post">
        <label>ID: <?php echo $row['id']; ?></label><br><br>
        <label for="maloai">Mã loại:</label>
        <input type="text" name="maloai" id="maloai" value="<?php echo $row['maloai']; ?>" required><br><br>
        <label for="tenloai">Tên hàng:</label>
        <input type="text" name="tenloai" id="tenloai" value="<?php echo $row['tenloai']; ?>" required><br><br>
        <button type="submit">Sửa</button>
        <a href="BT1_dslh.php"><button type="button">Hủy</button></a>
    </form>
</body>
</html>

<?php
// Đóng kết nối
$conn->close();
?>
