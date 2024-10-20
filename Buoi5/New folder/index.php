<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ngày Sinh</title>
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
        input[type="number"] {
            width: 30px;
            flex: 2;
        }
        input[type="number"]#ngay{
            margin-left: 10px;
        }
        input[type="number"]#nam {
            width: 50px;
            flex: 2;
        }
        input[type="submit"]{
            margin-left: 40px;
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
        .result {
            margin-top: 20px;
            font-size: 18px;
            color: #333;
        }
    </style>

</head>
<body>
    <div class="container">
        <form action="" method="post">
            <h1>NGÀY SINH</h1>
            <div class="group-form">
                Ngày/Tháng/Năm sinh : 
                <input type="number" name="ngay" id="ngay" min="1" max="30">/
                <input type="number" name="thang" id="thang" min="1" max="12">/
                <input type="number" name="nam" id="nam" min="1970" max="2100">
                <input type="submit" value="Thông báo">
            </div>            
        </form>
        <?php
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $nam = $_POST["nam"];
            $ngay = $_POST["ngay"];
            $thang = $_POST["thang"];

           //Tính tuổi
           $currentYear = date("Y");
           $tuoi = $currentYear - $nam;
            

           // Ngày sinh nhật năm nay
           $birthdayThisYear = strtotime("$currentYear-$thang-$ngay");
           $currentDate = time();

           // Tính số ngày đã qua kể từ ngày sinh nhật năm nay
           $daysPassed = floor(($currentDate - $birthdayThisYear) / (60 * 60 * 24));

           // Nếu ngày sinh nhật năm nay chưa đến, số ngày đã qua là 0
           if ($currentDate < $birthdayThisYear) {
               $daysPassed = 0; // Chưa đến sinh nhật năm nay
           }


            echo "<div class='result'>";
            echo "Năm nay bạn $tuoi tuổi<br>";
            echo "Ngày sinh nhật của bạn đã qua $daysPassed ngày.";
            echo "</div>";
        }
    ?>
    </div>

    
</body>
</html>