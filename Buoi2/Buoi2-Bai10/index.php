<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buổi 2 - Bài 10</title>

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
            margin: 10px 0px 10px 50px;
        }
        input[type="number"] {
            padding: 5px;
            border: 2px solid #ccc;
            display: inline-block;
            width: 150px;
        }
        input[type="text"] {
            padding: 5px;
            border: 2px solid #ccc;
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
            <h1>Tính Tiền KARAOKE</h1>

            <div class="form-group">
                <label for="startTime">Giờ bắt đầu :</label>
                <input type="number" name="startTime" id="startTime" min="10" max="24" required>
            </div>

            <div class="form-group">
                <label for="endTime">Giờ kết thúc :</label>
                <input type="number" name="endTime" id="endTime" min="10" max="24" required>
            </div>

            <div class="form-group">
                <label for="pay">Tiền thanh toán :</label>
                <input type="text" name="pay" id="pay" readonly>
            </div>
            
                <input type="submit" value="Tính tiền">
        </form>

        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST"){

                $startTime = $_POST['startTime'];
                $endTime = $_POST['endTime'];

                if($startTime >= $endTime){
                    echo "<script>alert('Giờ kết thúc phải lớn hơn giờ bắt đầu');</script>";
                }else {
                    // Khung  giờ và giá tương đương
                    $morningRate = 20000;
                    $eveningRate = 45000;
                    $pay = 0;
                    // Nếu cả thời gian trong khoảng từ 10h - 17h
                    if($endTime <= 17){
                        $pay = ($endTime - $startTime) * $morningRate;
                    }elseif ($startTime >= 17) {
                        $pay = ($endTime - $startTime) * $eveningRate;
                    }
                    //Nếu thời gian trải qua trong cả 2 khung giờ
                    else {
                        $morningHours = 17 - $startTime;
                        $eveningHours = $endTime - 17;

                        $pay = ($morningHours*$morningRate)+($eveningHours*$eveningRate);
                    }
                }

                echo 
                
                "<script>
                    document.getElementById('pay').value = '$pay';
                </script>";
            }
        ?>
    </div>
    
</body>
</html>


