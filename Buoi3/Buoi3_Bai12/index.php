<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đọc Số</title>

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
            <h1>Đọc Số</h1>
            <div class = "form-group">
                <label for="nhapSo">Nhập số : </label>
                <input type="text" name="nhapSo" id="nhapSo" required>
            </div>

            <input type="submit" value="=>">

            <div class = "form-group">
                <label for="result">Bằng chữ : </label>
                <input type="text" name="result" id="result" readonly>
            </div>
        </form>
    </div>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $number = $_POST['nhapSo'];
            $result = ' ';


            switch ($number) {
                case '0':
                    $result = 'Không';
                    break;
                case '1':
                    $result = 'Một';
                    break;
                case '2':
                    $result = 'Hai';
                    break;
                case '3':
                    $result = 'Ba';
                    break;
                case '4':
                    $result = 'Bốn';
                    break;
                case '5':
                    $result = 'Năm';
                    break;
                case '6':
                    $result = 'Sáu';
                    break;
                case '7':
                    $result = 'Bảy';
                    break;
                case '8':
                    $result = 'Tám';
                    break;
                case '9':
                    $result = 'Chín';
                    break;
                default:
                    $result = 'Không hợp lệ';
                    break;
                }
            echo 
            "<script>
                document.getElementById('result').value = '$result';
            </script>";
        }
    

    ?>
</body>
</html>