<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm Từ Trong Chuỗi</title>

    <style>
        body {
            display: flex;
            justify-content: center; /* Canh giữa theo chiều ngang */
            align-items: center; /* Canh giữa theo chiều dọc */
            height: 100vh; /* Đặt chiều cao của body bằng với chiều cao của viewport */
            margin: 0; /* Loại bỏ khoảng cách mặc định */
        }
        .container {
            display: flex;
            max-width: 500px;
            flex-direction: column;
            text-align: center;
            border-radius: 10px;
            border: 2px solid #000;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            background-color: #F5F5CD;
        }
        .group-form {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        label {
            flex: 2;
        }
        input[type="text"] {
            flex: 2;
        }
        h1 {
            color: red;
        }
        input[readonly] {
            margin-top: 10px;
            color: red;
            background-color: yellow;
            width: 250px;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <h1>Tìm Từ Trong Chuỗi</h1>
            <div class="group-form">
                <label for="chuoi">Chuỗi : </label>
                <input type="text" name="chuoi" id="chuoi" required>
            </div>         
            <div class="group-form">
                <label for="find">Từ cần tìm : </label>
                <input type="text" name="find" id="find" required>
            </div>
            <input type="submit" value="Tìm kiếm">
            <br>
            <input type="text" name="result" id="result" readonly>
        </form>
    </div>

    <?php
    // Kiểm tra xem có yêu cầu POST không
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lấy chuỗi và từ cần tìm từ form
        $chuoi = $_POST["chuoi"];
        $find = $_POST["find"];
        
        // Tìm vị trí từ trong chuỗi
        $position = strpos($chuoi, $find);

        if ($position !== false) {
            // Nếu tìm thấy, trả về vị trí (đếm từ 0)
            $result = "Từ '$find' được tìm thấy ở vị trí số " . $position;
        } else {
            // Nếu không tìm thấy
            $result = "Từ '$find' không có trong chuỗi.";
        }
        // Hiển thị kết quả lên ô readonly bằng JavaScript
        echo "<script>document.getElementById('result').value = '". addslashes($result) ."';</script>";
    }
?>
</body>
</html>
