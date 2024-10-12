<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đọc Số</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        #result {
            background-color: #f8f8f8;
            cursor: default;
        }
    </style>
</head>
<body>
    <form action="" method="POST">
        <div class="container">
            <h1>ĐỌC SỐ</h1>
            <div class="form-group">
                <label for="number">Nhập số (0 -> 999):</label>
                <input type="text" id="number" name="number" min="0" max="999" required>
                <input type="submit" value="Đọc số">
            </div>
            
            <div class="form-group">
                <label for="result">Bằng chữ:</label>
                <input type="text" id="result" name="result" readonly>
            </div>
        </div>
    </form>

    <?php
        //Hàm đọc số từ 0 -> 9
        function Doc_1_so($n){
            $so = ["Không","Một","Hai","Ba","Bốn","Năm","Sáu","Bảy","Tám","Chín"];
            return $so[$n];
        }

        //Hàm đọc số từ 0 -> 999
        function Doc_so($num){
            if($num == 0) return "Không";

            $tram = floor($num/100);
            $chuc = floor(($num%100)/10);
            $donvi = $num % 10;

            $result = '';

            // Đọc hàng trăm
            if($tram > 0){
                $result .= Doc_1_so($tram) . ' trăm';
            }

            // Đọc hàng chục và đơn vị
            if($chuc > 0){
                if($chuc == 1){
                    $result .= ' mười';
                } else {
                    $result .= ' ' . Doc_1_so($chuc) .' mươi';
                }
            } elseif($tram > 0 && $donvi > 0){
                $result .= ' linh';
            }

            // Đọc hàng đơn vị
            if($donvi > 0){
                if($chuc > 0 && $donvi == 5){
                    $result .= ' lăm';
                } else {
                    $result .= ' '. Doc_1_so($donvi);
                }
            }

            return trim($result);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy số từ người dùng nhập vào
            $number = intval($_POST['number']);
    
            // Kiểm tra giới hạn của số nhập vào (0 - 999)
            if ($number >= 0 && $number <= 999) {
                $result = Doc_so($number);
            } else {
                $result = "Số không hợp lệ";
            }
    
            // Hiển thị kết quả
            echo "<script>document.getElementById('result').value = '$result';</script>";
        }
    ?>
</body>
</html>
