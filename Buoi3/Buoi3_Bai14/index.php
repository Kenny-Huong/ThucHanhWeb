<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Năm Âm Lịch</title>

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
            
        }
        input[type="number"] {
            padding: 5px;
            border: 2px solid #ccc;
            display: inline-block;
            margin-left: 50px;
            width: 100px;
        }
        input[type="text"] {
            padding: 5px;
            border: 2px solid #ccc;
            display: inline-block;
            width:90px;
            margin:0px 50px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            margin-left: 40px;
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
        label#kenny{
            margin-left: 100px;
        }

        label#huong{
            margin-left: 50px;
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
            <h1>Tính Năm Âm Lịch</h1>
            <div class = "form-group">
                <label id="huong" for="nhapSo">Năm Dương Lịch : </label>
                <label id="kenny" for="result">Năm Âm Lịch : </label>
            </div>

            <div class = "form-group">
                <input type="number" name="nhapSo" id="nhapSo" required>
                <input type="submit" value="=>">
                <input type="text" name="result" id="result" readonly>
            </div>
        </form>
    </div>

    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $namDuong = $_POST['nhapSo'];
    $can = $namDuong % 10;
    $chi = $namDuong % 12;

    // Xác định Can
    switch ($can) {
        case 0: $canText = 'Canh'; break;
        case 1: $canText = 'Tân'; break;
        case 2: $canText = 'Nhâm'; break;
        case 3: $canText = 'Quý'; break;
        case 4: $canText = 'Giáp'; break;
        case 5: $canText = 'Ất'; break;
        case 6: $canText = 'Bính'; break;
        case 7: $canText = 'Đinh'; break;
        case 8: $canText = 'Mậu'; break;
        case 9: $canText = 'Kỷ'; break;
    }

    // Xác định Chi
    switch ($chi) {
        case 0: $chiText = 'Thân'; break;
        case 1: $chiText = 'Dậu'; break;
        case 2: $chiText = 'Tuất'; break;
        case 3: $chiText = 'Hợi'; break;
        case 4: $chiText = 'Tý'; break;
        case 5: $chiText = 'Sửu'; break;
        case 6: $chiText = 'Dần'; break;
        case 7: $chiText = 'Mão'; break;
        case 8: $chiText = 'Thìn'; break;
        case 9: $chiText = 'Tỵ'; break;
        case 10: $chiText = 'Ngọ'; break;
        case 11: $chiText = 'Mùi'; break;
    }

    // Kết quả năm âm lịch
    $namAmLich = $canText . ' ' . $chiText;

    echo "<script>document.getElementById('result').value = '$namAmLich';</script>";
}
?>

</body>
</html>