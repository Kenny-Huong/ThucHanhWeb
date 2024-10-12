<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thay Thế Từ Trong Chuỗi</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }

        .container {
            width: 450px;

            background-color: #FFD5D5;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            background-color: #F05A28;
            color: white;
            padding: 10px;
            font-size: 20px;
            margin-bottom: 15px;
            border-radius: 4px;
        }

        .group-form {
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .group-form label {
            font-size: 16px;
            width: 100px;
            text-align: left;
        }

        .group-form input[type="text"] {
            width: 300px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #F05A28;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #e0481f;
        }

        #result {
            margin-top: 10px;
            padding: 10px;
            width: 100%;
            border: 1px solid #ccc;
            background-color: #FFFABC;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <div class="container">
            <h1>THAY THẾ TỪ TRONG CHUỖI</h1>

            <div class="group-form">
                <label for="chuoi">Chuỗi:</label>
                <input type="text" id="chuoi" name="chuoi" required>
            </div>

            <div class="group-form">
                <label for="tuGoc">Từ gốc:</label>
                <input type="text" id="tuGoc" name="tuGoc" required>
            </div>

            <div class="group-form">
                <label for="tuThayThe">Từ thay thế:</label>
                <input type="text" id="tuThayThe" name="tuThayThe" required>
            </div>

            <input type="submit" value="Thay thế">
            
            <input type="text" id="result" name="result" readonly value="<?php 
                // Kiểm tra nếu có dữ liệu từ form
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $chuoi = $_POST['chuoi'];
                    $tuGoc = $_POST['tuGoc'];
                    $tuThayThe = $_POST['tuThayThe'];
                    // Thay thế từ gốc bằng từ thay thế
                    $result = str_replace($tuGoc, $tuThayThe, $chuoi);
                    echo htmlspecialchars($result); // Xuất kết quả ra ô readonly
                }
            ?>">
        </div>
    </form>
</body>
</html>
