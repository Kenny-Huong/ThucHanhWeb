<?php
include 'database.php';

// Xử lý form khi người dùng gửi yêu cầu
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['maSua']) && !empty(trim($_POST['maSua']))) {
        $maSua = $_POST['maSua'];
    } else {
        die("Lỗi: Vui lòng nhập mã sữa hợp lệ.");
    }

    $tenSua = $_POST['tenSua'];
    $maHangSua = $_POST['maHangSua'];
    $maLoaiSua = $_POST['maLoaiSua'];
    $tpDinhDuong = $_POST['tpDinhDuong'];
    $loiIch = $_POST['loiIch'];
    $trongLuong = $_POST['trongLuong'];
    $donGia = $_POST['donGia'];
    $hinh = $_POST['hinh'];

    // Kiểm tra mã sữa có tồn tại chưa
    $checkQuery = $pdo->prepare("SELECT * FROM sua WHERE Ma_sua = :maSua");
    $checkQuery->bindValue(':maSua', $maSua, PDO::PARAM_STR);
    $checkQuery->execute();

    if ($checkQuery->rowCount() > 0) {
        $errorMessage = "Mã sữa đã tồn tại. Vui lòng nhập mã khác.";
    } else {
        // Chèn dữ liệu mới
        $sql = "INSERT INTO sua (Ma_sua, Ten_sua, Ma_hang_sua, Ma_loai_sua, TP_dinh_duong, Loi_ich, Trong_luong, Don_gia, Hinh) 
                VALUES (:maSua, :tenSua, :maHangSua, :maLoaiSua, :tpDinhDuong, :loiIch, :trongLuong, :donGia, :hinh)";
        $query = $pdo->prepare($sql);

        $query->bindValue(':maSua', $maSua, PDO::PARAM_STR);
        $query->bindValue(':tenSua', $tenSua, PDO::PARAM_STR);
        $query->bindValue(':maHangSua', $maHangSua, PDO::PARAM_INT);
        $query->bindValue(':maLoaiSua', $maLoaiSua, PDO::PARAM_INT);
        $query->bindValue(':tpDinhDuong', $tpDinhDuong, PDO::PARAM_STR);
        $query->bindValue(':loiIch', $loiIch, PDO::PARAM_STR);
        $query->bindValue(':trongLuong', $trongLuong, PDO::PARAM_INT);
        $query->bindValue(':donGia', $donGia, PDO::PARAM_INT);
        $query->bindValue(':hinh', $hinh, PDO::PARAM_STR);

        if ($query->execute()) {
            // Kiểm tra nếu bản ghi được thêm vào
            $rowCount = $query->rowCount();
            if ($rowCount > 0) {
                $successMessage = "Thêm sản phẩm thành công! Tổng số bản ghi được thêm: $rowCount.";
            } else {
                $errorMessage = "Không có bản ghi nào được thêm vào cơ sở dữ liệu.";
            }
        } else {
            $errorMessage = "Có lỗi xảy ra khi thêm sản phẩm.";
        }
        
    }
}

// Lấy danh sách loại sữa và hãng sữa để hiển thị trong dropdown
$loaiSuaQuery = $pdo->query("SELECT * FROM loai_sua");
$loaiSuaList = $loaiSuaQuery->fetchAll(PDO::FETCH_ASSOC);

$hangSuaQuery = $pdo->query("SELECT * FROM hang_sua");
$hangSuaList = $hangSuaQuery->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm Mới Sản Phẩm</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2 class="text-center mt-4">THÊM MỚI SẢN PHẨM</h2>
    
    <?php if (isset($successMessage)): ?>
        <div class="alert alert-success text-center"><?= htmlspecialchars($successMessage) ?></div>
    <?php endif; ?>
    <?php if (isset($errorMessage)): ?>
        <div class="alert alert-danger text-center"><?= htmlspecialchars($errorMessage) ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="mb-3">
            <label for="maSua" class="form-label">Mã Sữa:</label>
            <input type="text" id="maSua" name="maSua" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="tenSua" class="form-label">Tên Sữa:</label>
            <input type="text" id="tenSua" name="tenSua" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="maHangSua" class="form-label">Hãng Sữa:</label>
            <select id="maHangSua" name="maHangSua" class="form-select" required>
                <option value="">-- Chọn Hãng Sữa --</option>
                <?php foreach ($hangSuaList as $hangSua): ?>
                    <option value="<?= htmlspecialchars($hangSua['Ma_hang_sua']) ?>"><?= htmlspecialchars($hangSua['Ten_hang_sua']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="maLoaiSua" class="form-label">Loại Sữa:</label>
            <select id="maLoaiSua" name="maLoaiSua" class="form-select" required>
                <option value="">-- Chọn Loại Sữa --</option>
                <?php foreach ($loaiSuaList as $loaiSua): ?>
                    <option value="<?= htmlspecialchars($loaiSua['Ma_loai_sua']) ?>"><?= htmlspecialchars($loaiSua['Ten_loai']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="tpDinhDuong" class="form-label">Thành Phần Dinh Dưỡng:</label>
            <textarea id="tpDinhDuong" name="tpDinhDuong" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label for="loiIch" class="form-label">Lợi Ích:</label>
            <textarea id="loiIch" name="loiIch" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label for="trongLuong" class="form-label">Trọng Lượng (gram):</label>
            <input type="number" id="trongLuong" name="trongLuong" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="donGia" class="form-label">Đơn Giá (VND):</label>
            <input type="number" id="donGia" name="donGia" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="hinh" class="form-label">URL Hình Ảnh:</label>
            <input type="text" id="hinh" name="hinh" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Thêm Sản Phẩm</button>
    </form>
</div>
</body>
</html>
