<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chào Theo Giờ</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
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
            width: 100%;
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
        <form action="" method="POST">
            <h1>CHÀO THEO GIỜ</h1>
            <label for="hour">Nhập giờ:</label>
            <input type="number" id="hour" name="hour" min="0" max="23" required>
            <br><br>
            <button type="submit">Chào</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $hour = $_POST['hour'];
            $message = "";

            if ($hour >= 0 && $hour < 13) {
                $message = "Chào buổi sáng!";
            } elseif ($hour >= 13 && $hour < 19) {
                $message = "Chào buổi chiều!";
            } elseif ($hour >= 19 && $hour <= 23) {
                $message = "Chào buổi tối!";
            }
            echo "<div class='result'>$message</div>";
        }
        ?>
    </div>

</body>
</html>
