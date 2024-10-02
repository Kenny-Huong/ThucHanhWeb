<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Day of the month</title>
    <style>
        body{
            font-family: Arial, sams-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container{
            background-color: #db95b7;
            border-radius: 10px;
            padding: 20px;
            width: 350px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1{
            background-color: #c63768;
            margin: 0;
            padding: 15px;
            color: white;
            font-size: 1.5em;
        }
        
        .form-group{
            margin: 15px 0;
            text-align: center;
        }
        input[type="text"], input[type="number"] {
            margin:10px 5px;
            width: 20%;
            padding: 3px;
            border: 2px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 1em;
        }
        input#result{
            width: 250px;
        }

        input[readonly] {
            background-color: #ffffd2;
            color: black;
        }
        
        button{
            width: 45%;
            margin-left: 90px;
        }
        button[type="submit"]:hover {
            background-color: violet;
        }  
    </style>
</head>
<body>
    <div class = "container">
        <form action="" method="POST">
            <h1>Tính Ngày Trong Tháng</h1>
            <div calss = "form-group">
                <label for="month">Tháng/năm: </label>
                <input type="number" id="month" name="month" placeholder="Tháng" min="1" max="12" required> /
                <input type="number" id="year" name="year" placeholder="Năm" min="1900" required>
            </div>

            <div>
                <button type="submit">Tính số ngày</button>
            </div>

            <div calss = "form-group"> 
                <input type="text" id="result" name="result" readonly placeholder="Số ngày trong tháng">
            </div>
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $month = $_POST['month'];
        $year = $_POST['year'];
        $days = 0;

        switch ($month) {
            case 1: case 3: case 5: case 7: case 8: case 10: case 12:
                $days = 31;
                break;
            case 4: case 6: case 9: case 11:
                $days = 30;
                break;
            case 2:
                // Kiểm tra năm nhuận
                if (($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0)) {
                    $days = 29;
                } else {
                    $days = 28;
                }
                break;
            default:
                $days = "Tháng không hợp lệ";
                break;
        }

        echo "<script>
            document.getElementById('result').value = 'Tháng $month năm $year có $days ngày';
        </script>";
    }
    ?>
</body>
</html>