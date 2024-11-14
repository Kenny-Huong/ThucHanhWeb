<?php
include 'database.php';

// Truy vấn để lấy tất cả dữ liệu từ bảng sữa
$query = $pdo->prepare("SELECT sua.*, hang_sua.Ten_hang_sua, loai_sua.Ten_loai 
                        FROM sua 
                        JOIN hang_sua ON sua.Ma_hang_sua = hang_sua.Ma_hang_sua 
                        JOIN loai_sua ON sua.Ma_loai_sua = loai_sua.Ma_loai_sua");

$query->execute();
$products = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thông Tin Sữa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; color: #333; }
        .odd-row { background-color: #f9f9f9; }
        .even-row { background-color: #ffffff; }
        .product-image { width: 100px; height: auto; }
    </style>
</head>
<body>
    <div class="container">
        
        <table class="table">
            <thead>
                <tr>
                    <!-- Hàng riêng đứng trên đầu, không có cột, chỉ có một ô duy nhất -->
                    <th colspan="5" class="header-row">
                        <h2>THÔNG TIN SẢN PHẨM</h2>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $productCount = count($products); // Số lượng sản phẩm
                for ($i = 0; $i < $productCount; $i += 5): ?>
                    <tr>
                        <?php 
                        // Lặp qua tối đa 5 sản phẩm trong mỗi hàng
                        for ($j = $i; $j < $i + 5 && $j < $productCount; $j++): 
                            $product = $products[$j]; // Lấy sản phẩm thứ j
                        ?>
                            <td>
                                <a href="chitiet_sua.php?ma_sua=<?= htmlspecialchars($product['Ma_sua']) ?>"> 
                                    <?= htmlspecialchars($product['Ten_sua']) ?>
                                </a>
                                <br> Nhà sản xuất: <?= htmlspecialchars($product['Ten_hang_sua']) ?> <br>
                                <?= htmlspecialchars($product['Ten_loai']) ?> - 
                                <?= htmlspecialchars($product['Trong_luong']) ?> g - 
                                <?= number_format($product['Don_gia'], 0, ',', '.') ?> VND
                                <br>
                                <img src="<?= htmlspecialchars($product['Hinh']) ?>" alt="Ảnh sản phẩm" class="product-image">
                            </td>
                        <?php endfor; ?>
                    </tr>
                <?php endfor; ?>
            </tbody>
        </table>

    </div>
</body>
</html>
