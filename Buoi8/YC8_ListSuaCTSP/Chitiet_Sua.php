<?php
include 'database.php';

// Lấy mã sữa từ URL
$ma_sua = isset($_GET['ma_sua']) ? $_GET['ma_sua'] : null;

if ($ma_sua) {
    // Truy vấn để lấy chi tiết sản phẩm theo mã sữa
    $query = $pdo->prepare("SELECT sua.*, hang_sua.Ten_hang_sua, loai_sua.Ten_loai 
                            FROM sua 
                            JOIN hang_sua ON sua.Ma_hang_sua = hang_sua.Ma_hang_sua 
                            JOIN loai_sua ON sua.Ma_loai_sua = loai_sua.Ma_loai_sua 
                            WHERE sua.Ma_sua = :ma_sua");
    $query->bindParam(':ma_sua', $ma_sua, PDO::PARAM_INT);
    $query->execute();
    $product = $query->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chi Tiết Sản Phẩm Sữa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        .product-detail {
            display: flex;
            margin-top: 30px;
            border: 2px solid #ddd; /* Viền xung quanh cả phần ảnh và thông tin */
            padding: 15px;
            border-radius: 8px; /* Góc bo tròn */
        }
        .product-detail .product-image {
            width: 300px;
            height: auto;
            margin-right: 20px;
            border: 2px solid #ddd; /* Viền quanh ảnh */
            border-radius: 8px; /* Góc bo tròn cho ảnh */
            padding: 5px;
        }
        .product-detail .product-info {
            flex: 1;
            border-left: 2px solid #ddd; /* Viền dọc giữa ảnh và thông tin */
            padding-left: 20px;
        }
        .product-info p {
            font-size: 18px;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if ($product): ?>
            <h2>Chi Tiết Sản Phẩm: <?= htmlspecialchars($product['Ten_sua']) ?></h2>
            <div class="product-detail">
                <div class="product-image">
                    <img src="<?= htmlspecialchars($product['Hinh']) ?>" alt="Ảnh sản phẩm" class="product-image">
                </div>
                <div class="product-info">
                    <p><strong>Nhà sản xuất: </strong><?= htmlspecialchars($product['Ten_hang_sua']) ?></p>
                    <p><strong>Loại: </strong><?= htmlspecialchars($product['Ten_loai']) ?></p>
                    <p><strong>Trọng lượng: </strong><?= htmlspecialchars($product['Trong_luong']) ?> g</p>
                    <p><strong>Đơn giá: </strong><?= number_format($product['Don_gia'], 0, ',', '.') ?> VND</p>
                    <p><strong>Thành phần dinh dưỡng: </strong><?= htmlspecialchars($product['TP_dinh_duong']) ?></p>
                    <p><strong>Lợi ích: </strong><?= htmlspecialchars($product['Loi_ich']) ?></p>
                </div>
            </div>
        <?php else: ?>
            <p>Không tìm thấy sản phẩm.</p>
        <?php endif; ?>
    </div>
</body>
</html>
