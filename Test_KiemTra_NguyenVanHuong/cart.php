<?php
session_start(); // Khởi tạo session
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ Hàng</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Giỏ hàng của bạn</h1>
    <?php
    // Kết nối cơ sở dữ liệu
    $conn = new mysqli('localhost:3366', 'root', '', 'quanlybanhang');

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }

    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        echo "<table border='1'>
                <tr>
                    <th>Mã sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Thành tiền</th>
                </tr>";

        $tong_tien = 0;
        foreach ($_SESSION['cart'] as $id => $quantity) {
            $sql = "SELECT ten_san_pham, gia FROM sanpham WHERE id = $id";
            $result = $conn->query($sql);
            $product = $result->fetch_assoc();

            $ten_san_pham = $product['ten_san_pham'];
            $gia = $product['gia'];
            $thanh_tien = $gia * $quantity;

            $tong_tien += $thanh_tien;

            echo "<tr>
                    <td>{$id}</td>
                    <td>{$ten_san_pham}</td>
                    <td>{$quantity}</td>
                    <td>" . number_format($gia, 0, ',', '.') . " VND</td>
                    <td>" . number_format($thanh_tien, 0, ',', '.') . " VND</td>
                  </tr>";
        }

        echo "<tr>
                <td colspan='4' style='text-align: right;'>Tổng tiền</td>
                <td>" . number_format($tong_tien, 0, ',', '.') . " VND</td>
              </tr>";
        echo "</table>";
    } else {
        echo "Giỏ hàng trống.";
    }

    $conn->close();
    ?>
    <br>
    <a href="banhang.php">Quay lại danh sách sản phẩm</a>
</body>
</html>
