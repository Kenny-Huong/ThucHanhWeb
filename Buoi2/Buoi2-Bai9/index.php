<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buổi 2 Bài 9</title>

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
            border: 1px solid #ccc;
            display: inline-block;
            width: 30px;
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
            <h1>Giải Phương Trình Bậc Nhất</h1>

            <div class="form-group">
                <label for="pt">Phương trình :</label>
                <input type="number" name = "a" id="a">x + <input type="number" name = "b" id = "b"> = 0;
            </div>

            <div class="form-group">
                <label for="nghiem">Nghiệm :</label>
                <input type="text" id="nghiem" readonly>
            </div>

            <button type="submit">Giải Phương Trình</button>
        </form>


        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                //Lấy dữ liệu từ form
                $a = $_POST['a'];
                $b = $_POST['b'];

                if($a==0){
                    if($b==0){
                        $nghiem = "Phương trình vô số nghiệm !";
                    }else {
                        $nghiem = "Phương trình vô nghiệm !";
                    }
                }else {
                    $nghiem = -($b/$a);
                }

                echo 
                "<script>
                    document.getElementById('nghiem').value = '$nghiem';
                </script>";
            }
        ?>
    </div>

    
</body>
</html>