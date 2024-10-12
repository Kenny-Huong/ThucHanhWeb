<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Số chia hết cho A và B</title>
    <style>
        body {
            font-family : Arial,sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0; 
        }
        .container {
            background-color: #ccc;
            text-align: center;
            width: 450px;
            border-radius: 10px;
            padding: 20px; 
        }
        input[type = "text"] {
            margin-top : 10px;
            padding: 10px;
            
        }
        input[type = "submit"]{
            margin-top : 5px;
            cursor: pointer;
            padding : 10px;
            border-radius : 10px;
        }
        input[type = "submit"]:hover {
            background-color : #99d5e4;
        }
        input#result {
           width: 400px;
           border-radius : 10px;
           font-weight : bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>SỐ CHIA HẾT CHO A VÀ B</h1>
        <form method="POST" action="">
            <label for="">Nhập N :</label>
            <input type="text" id="n" name="n" required>
            <br>
            <label for="">Nhập A :</label>
            <input type="text" name="a" id="a" required>
            <br>
            <label for="">Nhập B :</label>
            <input type="text" name="b" id="b" required>
            <br>
            <input type="submit" value="Các số <= N chia hết cho A và cho B"><br>
            <input type="text" id="result" name="result" readonly>
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $n = intval($_POST['n']); // Lấy giá trị N từ form
        $a = intval($_POST['a']); // Lấy giá trị A từ form
        $b = intval($_POST['b']); // Lấy giá trị B từ form

        if ($n > 0 && $a > 0 && $b > 0) {
            $results = []; // Mảng để lưu kết quả

            for ($i = 1; $i <= $n; $i++) { // Vòng lặp từ 1 đến N
                if ($i % $a == 0 && $i % $b == 0) { // Kiểm tra chia hết cho A và B
                    $results[] = $i; // Thêm số vào mảng kết quả
                }
            }

            // Chuyển mảng kết quả thành chuỗi và hiển thị
            $ketQua = implode(", ", $results);
            echo "<script>document.getElementById('result').value = '$ketQua';</script>";
        } else {
            echo "<script>document.getElementById('result').value = 'Vui lòng nhập số lớn hơn 0';</script>";
        }
    }
    ?>
</body>
</html>
