<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buổi 2 - Bài 11</title>

    <STYLE>
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
    </STYLE>
</head>
<body>
    <div class="container">
        <form action="" method="POST">
            <h1>Nhận Dạng Tam Giác</h1>

            <div class = "form-group">
                <label for="Canh1">Cạnh 1 :</label>
                <input type="number" name="Canh1" id="Canh1" min="1" required>
            </div>
            
            <div class = "form-group">
                <label for="Canh2">Cạnh 2 :</label>
                <input type="number" name="Canh2" id="Canh2" min="1" required>
            </div>

            <div class = "form-group">
                <label for="Canh3">Cạnh 3 :</label>
                <input type="number" name="Canh3" id="Canh3" min="1" required>
            </div>

            <div class = "form-group">
                <label for="result">Loại tam giác :</label>
                <input type="text" name="result" id="result" readonly>
            </div>

                <input type="submit" value="Nhận dạng">
        </form>

        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $Canh1 = $_POST['Canh1'];
                $Canh2 = $_POST['Canh2'];
                $Canh3 = $_POST['Canh3'];
                $result = $_POST['result'];

                if(($Canh1+$Canh2>$Canh3)&&($Canh1+$Canh3>$Canh2)&&($Canh3+$Canh2>$Canh1)){
                    if($Canh1==$Canh2 && $Canh2==$Canh3)
                    {
                        $result = "Tam giác đều";
                    }elseif ($Canh1==$Canh2||$Canh1==$Canh3||$Canh2==$Canh3) {
                        if(($Canh3==$Canh1*sqrt(2))||($Canh2==$Canh3*sqrt(2))||($Canh1==$Canh2*sqrt(2))){
                            $result = "Tam giác vuông cân";
                        }else{
                            $result = "Tam giác vuông";
                        }
                        
                    }else{
                         $result = "Tam giác thường";
                    }

                }else {
                    echo "<script>alert('3 cạnh không tạo thành 1 tam giác !!!');</script>";
                }

                echo 
                "<script>
                    document.getElementById('result').value = '$result';
                </script>";
            }
        ?>
    </div>
    
</body>
</html>