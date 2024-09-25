<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buoi 2 Bai 8</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e0e0e0;
            text-align: center;
            padding: 50px;
        }
        .container {
            background-color: #db95b7;
            border-radius: 10px;
            display: inline-block;
            padding: 20px; /* Thêm padding cho container */
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
        h1 {
            background-color: #c63768;
            margin: 0 0 10px 0;
            width: 450px;
            height: 60px;
            line-height: 60px;
            color: white; /* Đổi màu chữ cho dễ đọc */
            text-align: center; /* Căn giữa văn bản */
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="POST">
            <h1>Kết Qủa Thi Đại Học</h1>
            
            <div class="form-group">
                <label for="maths">Toán:</label>
                <input type="number" name="maths" id="maths" min="0" max="10" required>
            </div>

            <div class="form-group">
                <label for="physics">Lý:</label>
                <input type="number" name="physics" id="physics" min="0" max="10" required>
            </div>

            <div class="form-group">
                <label for="chemischy">Hóa:</label>
                <input type="number" name="chemischy" id="chemischy" min="0" max="10" required>
            </div>

            <div class="form-group">
                <label for="diemChuan">Điểm chuẩn:</label>
                <input type="number" name="diemChuan" id="diemChuan" readonly value="20">
            </div>

            <div class="form-group">
                <label for="tongDiem">Tổng điểm:</label>
                <input type="number" name="tongDiem" id="tongDiem" readonly>
            </div>

            <div class="form-group">
                <label for="KQThi">Kết quả thi:</label>
                <input type="text" name="KQThi" id="KQThi" readonly>
            </div>
            
            <button type="submit">Xem kết quả</button>
        </form>

        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                // Lấy điểm từ form
                $score1 = $_POST['maths'];
                $score2 = $_POST['physics'];
                $score3 = $_POST['chemischy'];
                $diemChuan = $_POST['diemChuan'];

                // Tính tổng điểm
                $tongDiem = round($score1 + $score2 + $score3, 2);
                
                // Kết quả thi
                if($tongDiem >= $diemChuan && $score1 > 0 && $score2 > 0 && $score3 > 0 ){
                    $KQThi = "Đậu";
                } else {
                    $KQThi = "Trượt";
                }

                echo 
                "<script>
                    document.getElementById('tongDiem').value = '$tongDiem';
                    document.getElementById('KQThi').value = '$KQThi';
                </script>";
            }
        ?>
    </div>
</body>
</html>
