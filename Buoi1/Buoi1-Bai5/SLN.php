<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm Số Lớn Hơn</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
            background-color: #e0e0e0;
        }
        .container {
            width: 300px;
            padding: 20px;
            background-color: #d4edda;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input[type="text"] {
            width: 95%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #ff9933;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #ff6600;
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
        <h2>Tìm Số Lớn Hơn</h2>
        <form method="POST" action="">
            <label for="soA">Số A:</label>
            <input type="text" id="soA" name="soA" placeholder="Nhập số A" required>
            
            <label for="soB">Số B:</label>
            <input type="text" id="soB" name="soB" placeholder="Nhập số B" required>
            
            <button type="submit">Tìm</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get the values from the form
            $soA = $_POST['soA'];
            $soB = $_POST['soB'];

            // Check if the input values are numeric
            if (is_numeric($soA) && is_numeric($soB)) {
                // Determine the larger number
                if ($soA > $soB) {
                    $ketQua = $soA;
                } elseif ($soB > $soA) {
                    $ketQua = $soB;
                } else {
                    $ketQua = "Hai số bằng nhau.";
                }
                echo "<div class='result'>Số lớn hơn: $ketQua</div>";
            } else {
                echo "<div class='result'>Vui lòng nhập đúng giá trị số cho A và B.</div>";
            }
        }
        ?>
    </div>

</body>
</html>