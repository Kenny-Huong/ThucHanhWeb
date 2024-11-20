<?php
session_start(); // Khởi tạo session
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Bán Hàng</title>
</head>
<body>
    <h1>Danh sách sản phẩm</h1>
    <?php
    // Kết nối cơ sở dữ liệu
    $conn = new mysqli('localhost:3366', 'root', '', 'quanlybanhang');

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    // Truy vấn danh sách sản phẩm
    $sql = "SELECT id, ten_san_pham, gia, mo_ta FROM sanpham";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Mô tả</th>
                <th>Thêm vào giỏ</th>
              </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['ten_san_pham']}</td>
                    <td>" . number_format($row['gia'], 0, ',', '.') . " VND</td>
                    <td>{$row['mo_ta']}</td>
                    <td><a href='add_cart.php?id={$row['id']}'>Thêm vào giỏ</a></td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "Không có sản phẩm nào.";
    }

    $conn->close();
    ?>
    <br>
    <a href="cart.php">Xem giỏ hàng</a>
</body>
</html>
