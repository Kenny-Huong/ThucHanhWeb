<?php
// Kết nối đến cơ sở dữ liệu
$conn = new mysqli("localhost:3366", "root", "", "ql_ban_sua");
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Xử lý yêu cầu xóa
// if (isset($_GET['delete_id'])) {
//     $delete_id = $_GET['delete_id'];
//     $conn->query("DELETE FROM loai_hang WHERE id = $delete_id");
//     header("Location: BT1_dslh.php");
//     exit;
// }

// Lấy danh sách hãng sữa
$result = $conn->query("SELECT * FROM khach_hang");
if (!$result) {
    die("Truy vấn thất bại: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yêu Cầu 3 - Nguyễn Văn Hướng</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <style>
        body{
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>THÔNG TIN HÃNG SỮA</h1>
        <table class='table table-striped table-bordered'>
            <tr>
                <th class="text-danger">Mã KH</th>
                <th class="text-danger">Tên khách hàng</th>
                <th class="text-danger">Giới tính</th>
                <th class="text-danger">Địa chỉ</th>
                <th class="text-danger">Số điện thoại</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['MA_KHACH_HANG']; ?></td>
                    <td><?php echo $row['TEN_KHACH_HANG']; ?></td>
                    <td>
                        <?php if ($row['PHAI'] == 1): ?>
                            <img src="Picture/boy.jpg" class="rounded-circle" style="height: 30px;" alt="Nam">
                        <?php else: ?>
                            <img src="Picture/girl.jpg" class="rounded-circle" style="height: 30px;" alt="Nữ">
                        <?php endif; ?>
                    </td>
                    <td><?php echo $row['DIA_CHI']; ?></td>
                    <td><?php echo $row['DIEN_THOAI']; ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>