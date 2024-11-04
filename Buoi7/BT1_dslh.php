<?php
// Kết nối đến cơ sở dữ liệu
$conn = new mysqli("localhost:3366", "root", "", "loai_hang");
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Xử lý yêu cầu xóa
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $conn->query("DELETE FROM loai_hang WHERE id = $delete_id");
    header("Location: BT1_dslh.php");
    exit;
}

// Lấy danh sách loại hàng
$result = $conn->query("SELECT * FROM loai_hang");
if (!$result) {
    die("Truy vấn thất bại: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách loại hàng</title>
</head>
<body>
    <h2>Danh sách loại hàng</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Mã loại</th>
            <th>Tên hàng</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['maloai']; ?></td>
                <td><?php echo $row['tenloai']; ?></td>
                <td><a href="BT1_suadl.php?id=<?php echo $row['id']; ?>">Sửa</a></td>
                <td><a href="BT1_dslh.php?delete_id=<?php echo $row['id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a></td>
            </tr>
        <?php endwhile; ?>
    </table>
    <br>
    <a href="BT1_themmoi.php"><button>Thêm mới</button></a>
</body>
</html>

<?php
// Đóng kết nối
$conn->close();
?>
