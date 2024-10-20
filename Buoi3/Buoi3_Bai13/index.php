<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thứ Trong Tuần</title>

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
            display: flex;
            align-items: center;
            margin-right: 20px;
        }
        label {
            display: inline-block;
            width: 150px; 
            text-align: left;
            margin: 10px 0px 10px 20px;
        }
        input[type="number"] {
            padding: 5px;
            border: 2px solid #ccc;
            display: inline-block;
            width: 150px;
        }
        input[type="number"] {
            padding: 5px;
            border: 2px solid #ccc;
            display: inline-block;
            width: 35px;
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
            width: 400px;
            margin-top: 10px;
        }
        input#result{
            text-align: center;
            font-weight: 800;
            
        }
        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            
        }
        button[type="submit"]:hover {
            background-color: #45a049;
        }

        h1 {
            background-color: #c63768;
            margin: 0 0 10px 0;
            width: 500px;
            height: 60px;
            line-height: 60px;
            color: white; /* Đổi màu chữ cho dễ đọc */
            text-align: center; /* Căn giữa văn bản */
        }
        input#year{
            width: 50px;
        }
    </style>
</head>
<body>
    <div class = "container">
        <form action="" method="POST">
            <h1>Tìm Thứ Trong Tuần</h1>
            <label for="">Ngày Tháng Năm :</label>
            <input type="number" id="day" name="day" min="1" max="31"required>/
            <input type="number" id="month" name="month" min="1" max="12"required>/
            <input type="number" id="year" name="year" min="1970" max="2100"required>
            <button type="submit">Tìm thứ trong tuần</button>
            <div>
                <input type="text" id="result" name="result" readonly>
            </div>
            
        </form>
    </div>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Lấy dữ liệu từ form
            $day = $_POST['day'];
            $month = $_POST['month'];
            $year = $_POST['year'];
    
            // Tạo timestamp từ ngày tháng năm
            $timestamp = mktime(0, 0, 0, $month, $day, $year);
    
            // Lấy số thứ trong tuần (0: Chủ nhật, 1: Thứ hai, ..., 6: Thứ bảy)
            $weekdayNumber = date("w", $timestamp);
    
            // Chuyển số thành tên thứ
            switch ($weekdayNumber) {
                case 0:
                    $weekdayName = "Chủ Nhật";
                    break;
                case 1:
                    $weekdayName = "Thứ Hai";
                    break;
                case 2:
                    $weekdayName = "Thứ Ba";
                    break;
                case 3:
                    $weekdayName = "Thứ Tư";
                    break;
                case 4:
                    $weekdayName = "Thứ Năm";
                    break;
                case 5:
                    $weekdayName = "Thứ Sáu";
                    break;
                case 6:
                    $weekdayName = "Thứ Bảy";
                    break;
                default:
                    $weekdayName = "Không xác định";
            }
    
            // Hiển thị ngày tháng năm và thứ trong tuần
            $result = "Ngày $day/$month/$year là $weekdayName";
    
            // In ra kết quả
            echo "<script>
                    document.getElementById('result').value = '$result';
                  </script>";
        }
    ?>
</body>
</html>