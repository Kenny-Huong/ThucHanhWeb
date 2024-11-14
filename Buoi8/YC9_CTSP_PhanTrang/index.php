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

    if ($product) {
        // Truy vấn để lấy các sản phẩm cùng loại hoặc cùng nhà sản xuất (có phân trang)
        $products_per_page = 5; // Số sản phẩm hiển thị mỗi trang
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($page - 1) * $products_per_page;

        // Truy vấn các sản phẩm cùng loại hoặc cùng nhà sản xuất
        $query_related = $pdo->prepare("SELECT sua.*, hang_sua.Ten_hang_sua, loai_sua.Ten_loai
                                        FROM sua
                                        JOIN hang_sua ON sua.Ma_hang_sua = hang_sua.Ma_hang_sua
                                        JOIN loai_sua ON sua.Ma_loai_sua = loai_sua.Ma_loai_sua
                                        WHERE sua.Ma_loai_sua = :ma_loai_sua OR sua.Ma_hang_sua = :ma_hang_sua
                                        LIMIT :limit OFFSET :offset");
        $query_related->bindParam(':ma_loai_sua', $product['Ma_loai_sua'], PDO::PARAM_INT);
        $query_related->bindParam(':ma_hang_sua', $product['Ma_hang_sua'], PDO::PARAM_INT);
        $query_related->bindParam(':limit', $products_per_page, PDO::PARAM_INT);
        $query_related->bindParam(':offset', $offset, PDO::PARAM_INT);
        $query_related->execute();
        $related_products = $query_related->fetchAll(PDO::FETCH_ASSOC);

        // Tính số trang cho sản phẩm liên quan
        $query_total = $pdo->prepare("SELECT COUNT(*) AS total FROM sua
                                      WHERE sua.Ma_loai_sua = :ma_loai_sua OR sua.Ma_hang_sua = :ma_hang_sua");
        $query_total->bindParam(':ma_loai_sua', $product['Ma_loai_sua'], PDO::PARAM_INT);
        $query_total->bindParam(':ma_hang_sua', $product['Ma_hang_sua'], PDO::PARAM_INT);
        $query_total->execute();
        $total_related_products = $query_total->fetch(PDO::FETCH_ASSOC)['total'];
        $total_pages = ceil($total_related_products / $products_per_page);
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chi Tiết Sản Phẩm Sữa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        .product-image {
            width: 300px;
            height: auto;
        }
        .related-product { margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <?php if ($product): ?>
            <h2>Chi Tiết Sản Phẩm: <?= htmlspecialchars($product['Ten_sua']) ?></h2>
            <div class="row">
                <div class="col-md-4">
                    <img src="<?= htmlspecialchars($product['Hinh']) ?>" alt="Ảnh sản phẩm" class="product-image">
                </div>
                <div class="col-md-8">
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

        <!-- Sản phẩm liên quan -->
        <?php if ($related_products): ?>
            <div class="related-product">
                <h3>Sản phẩm liên quan</h3>
                <div class="row">
                    <?php foreach ($related_products as $related_product): ?>
                        <div class="col-md-4">
                            <div class="card">
                                <img src="<?= htmlspecialchars($related_product['Hinh']) ?>" class="card-img-top" alt="Ảnh sản phẩm">
                                <div class="card-body">
                                    <h5 class="card-title"><?= htmlspecialchars($related_product['Ten_sua']) ?></h5>
                                    <p class="card-text"><?= htmlspecialchars($related_product['Ten_hang_sua']) ?></p>
                                    <p class="card-text"><?= number_format($related_product['Don_gia'], 0, ',', '.') ?> VND</p>
                                    <a href="chitiet_sua.php?ma_sua=<?= htmlspecialchars($related_product['Ma_sua']) ?>" class="btn btn-primary">Xem chi tiết</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- Phân trang sản phẩm liên quan -->
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <?php if ($page > 1): ?>
                    <li class="page-item"><a class="page-link" href="?ma_sua=<?= htmlspecialchars($ma_sua) ?>&page=1">Đầu</a></li>
                    <li class="page-item"><a class="page-link" href="?ma_sua=<?= htmlspecialchars($ma_sua) ?>&page=<?= $page - 1 ?>">Trước</a></li>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                        <a class="page-link" href="?ma_sua=<?= htmlspecialchars($ma_sua) ?>&page=<?= $i ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>

                <?php if ($page < $total_pages): ?>
                    <li class="page-item"><a class="page-link" href="?ma_sua=<?= htmlspecialchars($ma_sua) ?>&page=<?= $page + 1 ?>">Tiếp</a></li>
                    <li class="page-item"><a class="page-link" href="?ma_sua=<?= htmlspecialchars($ma_sua) ?>&page=<?= $total_pages ?>">Cuối</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</body>
</html>
