<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cạnh Huyền Tam Giác Vuông</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 150px;
            background-color: #e0e0e0;
            text-align: center;
        }
        .container {
            background-color: #d4edda;
            padding: 20px;
            border-radius: 10px;
            display: inline-block;
        }
        label {
            display: inline-block;
            margin-bottom: 5px;
            width: 100px;
            text-align: center;
        }
        input[type="text"] {
            width: 80%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            display: inline-block;
            width: 150px;
            margin-bottom: 5px;
        }
        button {
            width: 40%;
            padding: 10px;
            background-color: #4CAF50;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #4CAF50;
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
        <h2>Cạnh Huyền Tam Giác Vuông</h2>
        <form method="POST" action="">
            <label for="canhA">Cạnh A:</label>
            <input type="text" id="canhA" name="canhA" placeholder="Nhập giá trị cạnh A" required>
            
            <label for="canhB">Cạnh B:</label>
            <input type="text" id="canhB" name="canhB" placeholder="Nhập giá trị cạnh B" required>

            <button type="submit">Tính</button>
            
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get the values from the form
            $canhA = $_POST['canhA'];
            $canhB = $_POST['canhB'];

            // Check if the input values are numeric
            if (is_numeric($canhA) && is_numeric($canhB)) {
                // Calculate the hypotenuse
                $canhHuyen = sqrt(pow($canhA, 2) + pow($canhB, 2));
                echo "<div class='result'>Cạnh huyền: " . round($canhHuyen, 2) . "</div>";
            } else {
                echo "<div class='result'>Vui lòng nhập đúng giá trị cho cạnh A và cạnh B.</div>";
            }
        }
        ?>
    </div>

</body>
</html>