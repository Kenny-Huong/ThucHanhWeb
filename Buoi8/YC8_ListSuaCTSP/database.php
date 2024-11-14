<?php
// database.php
$host = 'localhost:3366';
$dbname = 'ql_ban_sua'; // Thay đổi tên cơ sở dữ liệu
$username = 'root'; // Thay đổi tên người dùng
$password = '';        // Thay đổi mật khẩu

try {
    // Sử dụng dấu ngoặc kép để biến được giải nén
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Lỗi kết nối: " . $e->getMessage());
}
?>
