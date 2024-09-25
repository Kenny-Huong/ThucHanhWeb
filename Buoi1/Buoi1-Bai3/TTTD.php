<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa Đơn Tiền Điện</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e0e0e0;
            text-align: center;
            padding: 50px;
        }
        .container {
            background-color: #d4edda;
            padding: 20px;
            border-radius: 10px;
            display: inline-block;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: inline-block;
            margin-bottom: 5px;
            width: 100px;
            text-align: right;
        }
        input[type="text"] {
            width: 75%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            display: inline-block;
            width: 150px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #ff6600;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Thanh Toán Tiền Điện</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="owner">Tên chủ hộ:</label>
                <input type="text" name="owner" id="owner" required>
            </div>
            <div class="form-group">
                <label for="old_reading">Chỉ số cũ (Kw):</label>
                <input type="text" name="old_reading" id="old_reading" required>
            </div>
            <div class="form-group">
                <label for="new_reading">Chỉ số mới (Kw):</label>
                <input type="text" name="new_reading" id="new_reading" required>
            </div>
            <div class="form-group">
                <label for="price">Đơn giá (VNĐ):</label>
                <input type="text" name="price" id="price" required value="2000">
            </div>
            <div class="form-group">
                <label for="total">Số tiền thanh toán (VNĐ):</label>
                <input type="text" name="total" id="total" readonly value="<?php echo isset($total) ? $total : ''; ?>">
            </div>
            <input type="submit" name="calculate" value="Tính">
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get input values
        $owner = $_POST['owner'];
        $old_reading = $_POST['old_reading'];
        $new_reading = $_POST['new_reading'];
        $price = $_POST['price'];

        // Validate inputs
        if (is_numeric($old_reading) && is_numeric($new_reading) && is_numeric($price) && $new_reading > $old_reading) {
            // Calculate electricity bill
            $units_used = $new_reading - $old_reading;
            $total = $units_used * $price;

            // Display the result
            echo "<script>document.getElementById('total').value = $total;</script>";
        } else {
            echo "<p style='color:red;'>Vui lòng nhập số hợp lệ và chỉ số mới phải lớn hơn chỉ số cũ.</p>";
        }
    }
    ?>
</body>
</html>