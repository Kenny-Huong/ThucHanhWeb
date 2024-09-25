
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="hcn.css">
    <title>Diện tích hình chữ nhật</title>
</head>
<body>
    <form method="POST" action="tich.php">
    <div class="container">
        <h2>Diện Tích Hình Chữ Nhật</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="length">Chiều dài:</label>
                <input type="text" name="length" id="length" required>
            </div>
            <div class="form-group">
                <label for="width">Chiều rộng:</label>
                <input type="text" name="width" id="width" required>
            </div>
            <div class="form-group">
                <label for="area">Diện tích:</label>
                <input type="text" name="area" id="area" readonly value="<?php echo isset($area) ? $area : ''; ?>">
            </div>
            <input type="submit" name="calculate" value="Tính">
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get input values
        $length = $_POST['length'];
        $width = $_POST['width'];

        // Validate inputs
        if (is_numeric($length) && is_numeric($width)) {
            // Calculate area
            $area = $length * $width;
            echo "<script>document.getElementById('area').value = $area;</script>";
        } else {
            echo "<p style='color:red;'>Vui lòng nhập số hợp lệ.</p>";
        }
    }
?>
</body>
</html>

