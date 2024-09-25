<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buổi 2 Bài 6</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e0e0e0;
            text-align: center;
            padding: 50px;
        }
        .container {
            background-color: #db95b7;
            padding: 20px;
            border-radius: 10px;
            display: inline-block;
        }
        .form-group {
            margin-bottom: 10px;
        }
        label {
            display: inline-block;
            margin-bottom: 10px;
            width: 150px; 
            text-align: left;
        }
        input[type="number"] {
            padding: 5px;
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
            background-color: #45a049;
        }
        input[readonly] {
            background-color: #ffffd2;
            color: black;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="POST">
            <h1>Kết Qủa Học Tập</h1>

            <div class="form-group">
                <label for="score1">Diem HK1 :</label>
                <input type="number" name="score1" id="score1" min="0" max="10" required>
            </div>

            <div class="form-group">
                <label for="score2">Diem HK2 :</label>
                <input type="number" name="score2" id="score2" min="0" max="10" required>
            </div>

            <div class="form-group">
                <label for="dtb">Diem Trung Binh :</label>
                <input type="text" name="dtb" id="dtb" readonly>
            </div>

            <div class="form-group">
                <label for="result">Ket Qua :</label>
                <input type="text" name="result" id="result" readonly>
            </div>

            <div class="form-group">
                <label for="xeploai">Xep Loai Hoc Luc :</label>
                <input type="text" name="xeploai" id="xeploai" readonly>
            </div>

            <button type="submit">Xem Kết Qủa</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Lấy điểm từ form
            $score1 = $_POST['score1'];
            $score2 = $_POST['score2'];

            // Tính điểm trung bình
            $dtb = round(($score1 + $score2*2) / 3, 1);

            // Xét kết quả lên lớp
            $result = $dtb >= 5 ? "Được lên lớp" : "Ở lại lớp";

            // Xếp loại học lực
            if ($dtb >= 8) {
                $xeploai = "Giỏi";
            } elseif ($dtb >= 6.5) {
                $xeploai = "Khá";
            } elseif ($dtb >= 5) {
                $xeploai = "Trung bình";
            } else {
                $xeploai = "Yếu";
            }
            
            // Gán giá trị tính toán vào các trường readonly trên form
            echo "<script>
                    document.getElementById('dtb').value = '$dtb';
                    document.getElementById('result').value = '$result';
                    document.getElementById('xeploai').value = '$xeploai';
                </script>";
        }
        ?>
    </div>
</body>
</html>
