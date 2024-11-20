<?php
session_start(); // Khởi tạo session

// Lấy mã sản phẩm từ URL
$product_id = isset($_GET['id']) ? $_GET['id'] : null;

if ($product_id) {
    // Nếu chưa tồn tại giỏ hàng thì tạo giỏ hàng
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
    if (isset($_SESSION['cart'][$product_id])) {
        // Tăng số lượng sản phẩm
        $_SESSION['cart'][$product_id]++;
    } else {
        // Thêm sản phẩm mới vào giỏ hàng
        $_SESSION['cart'][$product_id] = 1;
    }

    // Thông báo thành công
    echo "<script>alert('Sản phẩm đã được thêm vào giỏ hàng!'); window.location.href = 'banhang.php';</script>";
} else {
    echo "<script>alert('Không tìm thấy sản phẩm!'); window.location.href = 'banhang.php';</script>";
}
