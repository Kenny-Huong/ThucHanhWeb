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
$result = $conn->query("SELECT * FROM hang_sua");
if (!$result) {
    die("Truy vấn thất bại: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yêu Cầu 1 - Nguyễn Văn Hướng</title>

    <style>
        body{
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        h1{
            font-weight: bold;
            font-style: italic;
            color: skyblue;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>THÔNG TIN HÃNG SỮA</h1>
        <table border="1">
            <tr>
                <th>Mã hãng sữa</th>
                <th>Tên hãng</th>
                <th>Địa chỉ</th>
                <th>Điện thoại</th>
                <th>Email</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['Ma_hang_sua']; ?></td>
                    <td><?php echo $row['Ten_hang_sua']; ?></td>
                    <td><?php echo $row['Dia_chi']; ?></td>
                    <td><?php echo $row['Dien_thoai']; ?></td>
                    <td><?php echo $row['Email']; ?></td>
                    
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>