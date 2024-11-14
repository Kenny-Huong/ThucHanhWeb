<?php
include 'database.php';

// Xác định số dòng trên mỗi trang
$itemsPerPage = 5;

// Lấy số trang hiện tại từ URL, nếu không có thì mặc định là 1
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $itemsPerPage;

// Truy vấn để lấy dữ liệu từ bảng sữa
$query = $pdo->prepare("SELECT sua.*, hang_sua.Ten_hang_sua, loai_sua.Ten_loai 
                        FROM sua 
                        JOIN hang_sua ON sua.Ma_hang_sua = hang_sua.Ma_hang_sua 
                        JOIN loai_sua ON sua.Ma_loai_sua = loai_sua.Ma_loai_sua 
                        LIMIT :offset, :itemsPerPage");

$query->bindParam(':offset', $offset, PDO::PARAM_INT);
$query->bindParam(':itemsPerPage', $itemsPerPage, PDO::PARAM_INT);
$query->execute();
$products = $query->fetchAll(PDO::FETCH_ASSOC);

// Tính tổng số trang
$totalItems = $pdo->query("SELECT COUNT(*) FROM sua")->fetchColumn();
$totalPages = ceil($totalItems / $itemsPerPage);
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
                    <th colspan="2" class="header-row">
                        <h2>THÔNG TIN SẢN PHẨM</h2>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $index => $product): ?>
                    <?php $stt = ($page - 1) * $itemsPerPage + $index + 1; ?>
                    <tr class="<?= $index % 2 == 0 ? 'even-row' : 'odd-row' ?>">
                        <td><img src="<?= htmlspecialchars($product['Hinh']) ?>" alt="Ảnh sản phẩm" class="product-image"></td>
                        <td>
                            <strong><?= htmlspecialchars($product['Ten_sua']) ?></strong> 
                            <br> Nhà sản xuất : <?= $product['Ten_hang_sua'] ?> <br>
                            <?= $product['Ten_loai'] ?> - 
                            <?= $product['Trong_luong'] ?> -
                            <?= number_format($product['Don_gia'], 0, ',', '.') ?> VND
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Phân trang -->
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>
    </div>
</body>
</html>
