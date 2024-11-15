<?php
include 'database.php';

$itemsPerPage = 4; // Số sản phẩm mỗi trang
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $itemsPerPage;

// Lấy tổng số sản phẩm để tính tổng số trang
$totalQuery = $pdo->query("SELECT COUNT(*) FROM sua")->fetchColumn();
$totalPages = ceil($totalQuery / $itemsPerPage);

// Truy vấn để lấy dữ liệu sản phẩm của trang hiện tại
$query = $pdo->prepare("SELECT sua.*, hang_sua.Ten_hang_sua, loai_sua.Ten_loai 
                        FROM sua 
                        JOIN hang_sua ON sua.Ma_hang_sua = hang_sua.Ma_hang_sua 
                        JOIN loai_sua ON sua.Ma_loai_sua = loai_sua.Ma_loai_sua
                        LIMIT :offset, :itemsPerPage");
$query->bindValue(':offset', $offset, PDO::PARAM_INT);
$query->bindValue(':itemsPerPage', $itemsPerPage, PDO::PARAM_INT);
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
    td { width: 1%; white-space: nowrap; } /* Đặt kích thước cột theo nội dung */
    .product-image { width: 100px; height: auto; }
    .pagination { display: flex; justify-content: center; margin-top: 20px; }

    .container{
        margin-top: 50px;
        width: 600px;
    }
</style>

</head>
<body>
    <div class="container">
        <h2 class="text-center">THÔNG TIN SẢN PHẨM</h2>
        <table class="table">
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <th colspan="2" class="header-row" style="background-color: pink; font-family: 'Times New Roman', Times, serif; font-weight: bold; font-style: italic; color: green; ">
                        <?= htmlspecialchars($product['Ten_sua']) ?>
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <img src="<?= htmlspecialchars($product['Hinh']) ?>" alt="Ảnh sản phẩm" class="product-image">
                        </td>
                        <td>
                            Thành phần dinh dưỡng : <?= htmlspecialchars($product['TP_dinh_duong']) ?>
                            <?= htmlspecialchars($product['Ma_sua']) ?>
                            <br> Lợi ích : <?= htmlspecialchars($product['Loi_ich']) ?>
                            <br> <strong>Trọng lượng : </strong> <span style="color:red"><?= htmlspecialchars($product['Trong_luong']) ?> </span>
                                 <strong> - Đơn giá : </strong>  <span style="color: red;"><?= htmlspecialchars($product['Don_gia']) ?></span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <br><br><br><br><br>
        <!-- Phân trang -->
        <div class="pagination">
            <?php if ($page > 1): ?>
                <a href="?page=<?= $page - 1 ?>" class="btn btn-primary">Trang trước</a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="?page=<?= $i ?>" class="btn <?= $i == $page ? 'btn-secondary' : 'btn-outline-primary' ?>"><?= $i ?></a>
            <?php endfor; ?>

            <?php if ($page < $totalPages): ?>
                <a href="?page=<?= $page + 1 ?>" class="btn btn-primary">Trang sau</a>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
