<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng Cửu Chương</title>

    <style>
        body{
            background-color: #f4f4f4;
            justify-content: center;
            align-items: center;
            display: flex;
            height: 50vh;
        }
        .container{
            background-color: #db95b7;
            
            width: 400px;
            text-align: center;
            border-radius: 8px;
        }
        h1#tren{
            background-color: #c63768;
            color: white;
            margin: 0px 0px 20px 0px;
        }
        h1#duoi{
            background-color: #c63768;
            color: white;
            margin: 20px 0px 0px 0px;
            
        }   

        .result{
            width: 400px;
            height: auto;
           
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="POST">
            <h1 id="tren">BẢNG CỬU CHƯƠNG</h1>
            <label for="">Cửu Chương : </label>
            <input type="number" id="so" name="so" required>
            <button type="submit">Thực hiện</button>
            <h1 id="duoi">Kết Quả</h1>
        </form>

        <div class="result">
            <?php
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $number = $_POST['so'];

                    for ($i=1; $i <= 10 ; $i++) { 
                        $result = $number * $i;

                        echo "<p>$number x $i = $result</p>";
                    }
                }
            ?>
        </div>
    </div>
    
</body>
</html>