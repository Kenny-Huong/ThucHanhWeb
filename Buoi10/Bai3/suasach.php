<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $Masach = $_POST['Masach'];
    $Tensach = $_POST['Tensach'];
    $Soluong = $_POST['Soluong'];
    $Dongia = $_POST['Dongia'];
    $Tacgia = $_POST['Tacgia'];

    // Kết nối đến cơ sở dữ liệu
    $conn = new mysqli('localhost:3366', 'root', '', 'QLSach');

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Cập nhật thông tin sách
    $sql = "UPDATE Sachbuoi10 SET Tensach='$Tensach', Soluong=$Soluong, Dongia=$Dongia, Tacgia='$Tacgia' WHERE Masach='$Masach'";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Sửa thành công'); window.location.href='danhsach.php';</script>";
    } else {
        echo "<script>alert('Sửa thất bại');</script>";
    }

    $conn->close();
}
?>
