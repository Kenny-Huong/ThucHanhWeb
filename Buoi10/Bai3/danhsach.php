<?php
$conn = new mysqli('localhost:3366', 'root', '', 'QLSach');
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$sql = "SELECT * FROM Sachbuoi10";
$result = $conn->query($sql);

echo "<h2>DANH SÁCH SÁCH</h2>";
echo "<table border='1'>
<tr>
<th>Mã sách</th>
<th>Tên sách</th>
<th>Số lượng</th>
<th>Đơn giá</th>
<th>Tác giả</th>
</tr>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>{$row['Masach']}</td>
        <td>{$row['Tensach']}</td>
        <td>{$row['Soluong']}</td>
        <td>{$row['Dongia']}</td>
        <td>{$row['Tacgia']}</td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='5'>Không có sách nào</td></tr>";
}

echo "</table>";
$conn->close();
?>
