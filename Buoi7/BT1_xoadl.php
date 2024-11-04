<?php
// Kết nối đến cơ sở dữ liệu
$conn = new mysqli("localhost:3366", "root", "", "loai_hang");
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Xử lý xóa loại hàng
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("DELETE FROM loai_hang WHERE id = $id");
}

// Quay lại trang danh sách loại hàng
header("Location: BT1_dslh.php");
exit;
?>
