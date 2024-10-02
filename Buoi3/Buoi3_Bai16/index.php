<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Caculator</title>

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
        .input-group{
            display: flex;
            margin: 10px 0px;
        }

        .container{
            background-color: #db95b7;
            border-radius: 10px;
            padding: 20px;
            width: 500px;
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
           ;
        }
        .input-group label {
            flex: 1;
            text-align: left;
            margin-right: 10px;
        }

        
        input[type="text"], input[type="number"] {
            margin:10px 5px;
            padding: 3px;
            border: 2px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 1em;
        }
        input#number{
            width: 50px;
            
        }
        input#result{
            width: 250px;
        }

        input[readonly] {
            background-color: #ffffd2;
            color: black;
        }
        
        button{
            width: 30%;
            margin-left: px;
        }
        button[type="submit"]:hover {
            background-color: violet;
        }  
    </style>
</head>
<body>
    <div class="container">
        <form action="" method="POST">
            <h1>Tính Toán Trên Dãy Số</h1>
            <div class="forn-group">
                <label for="">Giới hạn của dãy số : </label>
                <label for="startNumber">Số bắt đầu :</label>
                <input type="number" name="startNumber" id="number" required>
                <label for="endNumber">Số kết thúc :</label>
                <input type="number" name="endNumber" id="number" required>
            </div>
            <label for="" class = "input-group">Kết quả</label>
            <div class = "input-group">
                <label for="tong">Tổng các số :</label>
                <input type="text" id="tong" name="tong" readonly>
            </div>
            <div class = "input-group">
                <label for="tong">Tích các số :</label>
                <input type="text" id="tich" name="tich" readonly>
            </div>
            <div class = "input-group">
                <label for="tong">Tổng các số chẵn:</label>
                <input type="text" id="tongChan" name="tong" readonly>
            </div>
            <div class = "input-group">
                <label for="tong">Tổng các số lẻ :</label>
                <input type="text" id="tongLe" name="tong" readonly>
            </div>
            <button type="submit">Tính toán</button>

        </form>
    </div>
    <?php
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $start = $_POST['startNumber'];
            $end = $_POST['endNumber'];
            

            $sum = 0;
            $product = 1;
            $even_sum = 0;
            $odd_sum = 0;

            for($i = $start; $i <= $end; $i++){
                $sum += $i;

                $product *= $i;
                
                switch($i % 2){
                    case 0:
                        $even_sum += $i;
                        break;
                    case 1:
                        $odd_sum += $i;
                        break;
                }
            }
        }

        echo
        "<script>
            document.getElementById('tong').value = '$sum';
            document.getElementById('tich').value = '$product';
            document.getElementById('tongChan').value = '$even_sum';
            document.getElementById('tongLe').value = '$odd_sum';
        </script>";
    ?>
    
</body>
</html>