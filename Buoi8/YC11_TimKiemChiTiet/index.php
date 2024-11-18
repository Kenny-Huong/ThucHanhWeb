<?php
include 'database.php';

$itemsPerPage = 4; // Number of products per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $itemsPerPage;

// Get the search inputs from the form
$tenSua = isset($_GET['tenSua']) ? $_GET['tenSua'] : '';
$maLoaiSua = isset($_GET['maLoaiSua']) ? $_GET['maLoaiSua'] : '';
$maHangSua = isset($_GET['maHangSua']) ? $_GET['maHangSua'] : '';

// Build the SQL query with the search conditions
$sql = "SELECT sua.*, hang_sua.Ten_hang_sua, loai_sua.Ten_loai 
        FROM sua 
        JOIN hang_sua ON sua.Ma_hang_sua = hang_sua.Ma_hang_sua 
        JOIN loai_sua ON sua.Ma_loai_sua = loai_sua.Ma_loai_sua 
        WHERE 1=1";

if (!empty($tenSua)) {
    $sql .= " AND sua.Ten_sua LIKE :tenSua";
}
if (!empty($maLoaiSua)) {
    $sql .= " AND sua.Ma_loai_sua = :maLoaiSua";
}
if (!empty($maHangSua)) {
    $sql .= " AND sua.Ma_hang_sua = :maHangSua";
}

$sql .= " LIMIT :offset, :itemsPerPage";

$query = $pdo->prepare($sql);

if (!empty($tenSua)) {
    $query->bindValue(':tenSua', '%' . $tenSua . '%', PDO::PARAM_STR);
}
if (!empty($maLoaiSua)) {
    $query->bindValue(':maLoaiSua', $maLoaiSua, PDO::PARAM_STR);
}
if (!empty($maHangSua)) {
    $query->bindValue(':maHangSua', $maHangSua, PDO::PARAM_STR);
}
$query->bindValue(':offset', $offset, PDO::PARAM_INT);
$query->bindValue(':itemsPerPage', $itemsPerPage, PDO::PARAM_INT);
$query->execute();
$products = $query->fetchAll(PDO::FETCH_ASSOC);

// Get the total number of products (used to calculate the total number of pages)
$totalQuery = "SELECT COUNT(*) FROM sua 
               JOIN hang_sua ON sua.Ma_hang_sua = hang_sua.Ma_hang_sua 
               JOIN loai_sua ON sua.Ma_loai_sua = loai_sua.Ma_loai_sua
               WHERE 1=1";

if (!empty($tenSua)) {
    $totalQuery .= " AND sua.Ten_sua LIKE :tenSua";
}
if (!empty($maLoaiSua)) {
    $totalQuery .= " AND sua.Ma_loai_sua = :maLoaiSua";
}
if (!empty($maHangSua)) {
    $totalQuery .= " AND sua.Ma_hang_sua = :maHangSua";
}

$totalCountQuery = $pdo->prepare($totalQuery);

if (!empty($tenSua)) {
    $totalCountQuery->bindValue(':tenSua', '%' . $tenSua . '%', PDO::PARAM_STR);
}
if (!empty($maLoaiSua)) {
    $totalCountQuery->bindValue(':maLoaiSua', $maLoaiSua, PDO::PARAM_STR);
}
if (!empty($maHangSua)) {
    $totalCountQuery->bindValue(':maHangSua', $maHangSua, PDO::PARAM_STR);
}

$totalCountQuery->execute();
$totalProducts = $totalCountQuery->fetchColumn();
$totalPages = ceil($totalProducts / $itemsPerPage);

// Fetch data for dropdowns
$loaiSuaQuery = $pdo->query("SELECT * FROM loai_sua");
$loaiSuaList = $loaiSuaQuery->fetchAll(PDO::FETCH_ASSOC);

$hangSuaQuery = $pdo->query("SELECT * FROM hang_sua");
$hangSuaList = $hangSuaQuery->fetchAll(PDO::FETCH_ASSOC);
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
        td { width: 1%; white-space: nowrap; }
        .product-image { width: 100px; height: auto; }
        .pagination { display: flex; justify-content: center; margin-top: 20px; }
        .container { margin-top: 50px; width: 600px; }
        .pagination {
            position: fixed;      
            bottom: 0;            
            left: 50%;            
            transform: translateX(-50%);
            display: flex;
            justify-content: center;
            margin: 0;
            padding: 10px;
            background-color: #f8f9fa;
            width: 100%;
        }
        h2.text-center {
            font-family: 'Times New Roman', Times, serif;
            font-size: 32px;
            font-weight: bold;
            font-style: italic;
            color: #4CAF50;
            text-align: center;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
            margin-top: 20px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">TÌM KIẾM THÔNG TIN SỮA</h2>
        
        
        <table class="table">
            <tbody>
            <tr>
                <td colspan="2" style="text-align: center;">
                <form method="GET" action="" class="mb-4">
                    <div class="mb-3">
                        <label for="tenSua" class="form-label">Tên sữa:</label>
                        <input type="text" name="tenSua" id="tenSua" class="form-control" value="<?= htmlspecialchars($tenSua) ?>">
                    </div>
                    <div class="mb-3">
                        <label for="maLoaiSua" class="form-label">Loại sữa:</label>
                        <select name="maLoaiSua" id="maLoaiSua" class="form-select">
                            <option value="">-- Tất cả --</option>
                            <?php foreach ($loaiSuaList as $loai): ?>
                                <option value="<?= $loai['Ma_loai_sua'] ?>" <?= $loai['Ma_loai_sua'] == $maLoaiSua ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($loai['Ten_loai']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="maHangSua" class="form-label">Hãng sữa:</label>
                        <select name="maHangSua" id="maHangSua" class="form-select">
                            <option value="">-- Tất cả --</option>
                            <?php foreach ($hangSuaList as $hang): ?>
                                <option value="<?= $hang['Ma_hang_sua'] ?>" <?= $hang['Ma_hang_sua'] == $maHangSua ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($hang['Ten_hang_sua']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                </form>
                </td>
            </tr>
            <!-- Display how many products were found -->
            <tr>
                <td colspan="2" style="text-align: center;">
                    <?php if ($totalProducts > 0): ?>
                        <p><strong>Có <?= $totalProducts ?> sản phẩm được tìm thấy.</strong></p>
                    <?php else: ?>
                        <p><strong>Không có sản phẩm nào được tìm thấy.</strong></p>
                    <?php endif; ?>
                </td>
            </tr>
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
                            <br> Lợi ích : <?= htmlspecialchars($product['Loi_ich']) ?>
                            <br> <strong>Trọng lượng : </strong> <span style="color:red"><?= htmlspecialchars($product['Trong_luong']) ?> </span>
                            <br> <strong>Đơn giá : </strong> <span style="color: red;"><?= htmlspecialchars($product['Don_gia']) ?></span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="pagination">
            <?php if ($page > 1): ?>
                <a href="?page=<?= $page - 1 ?>&tenSua=<?= htmlspecialchars($tenSua) ?>" class="btn btn-primary">Trang trước</a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="?page=<?= $i ?>&tenSua=<?= htmlspecialchars($tenSua) ?>" class="btn <?= $i == $page ? 'btn-secondary' : 'btn-outline-primary' ?>"><?= $i ?></a>
            <?php endfor; ?>

            <?php if ($page < $totalPages): ?>
                <a href="?page=<?= $page + 1 ?>&tenSua=<?= htmlspecialchars($tenSua) ?>" class="btn btn-primary">Trang sau</a>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
