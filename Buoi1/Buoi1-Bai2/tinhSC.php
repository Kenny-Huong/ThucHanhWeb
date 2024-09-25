<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculate Area and Circumference of Circle</title>
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
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            display: inline-block;
            width: 150px;
        }
        input[type="submit"] {
            background-color: #fa8231;
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
        <h2>Diện Tích và Chu Vi Hình Tròn</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="radius">Bán kính:</label>
                <input type="text" name="radius" id="radius" required>
            </div>
            <div class="form-group">
                <label for="area">Diện tích:</label>
                <input type="text" name="area" id="area" readonly value="<?php echo isset($area) ? $area : ''; ?>">
            </div>
            <div class="form-group">
                <label for="circumference">Chu vi:</label>
                <input type="text" name="circumference" id="circumference" readonly value="<?php echo isset($circumference) ? $circumference : ''; ?>">
            </div>
            <input type="submit" name="calculate" value="Tính">
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $radius = $_POST['radius'];

        if (is_numeric($radius)) {
            $pi = 3.14;

            $area = $pi * pow($radius, 2);
            $circumference = 2 * $pi * $radius;

            echo "<script>
                    document.getElementById('area').value = $area;
                    document.getElementById('circumference').value = $circumference;
                  </script>";
        } else {
            echo "<p style='color:red;'>Vui lòng nhập số hợp lệ.</p>";
        }
    }
    ?>
</body>
</html>