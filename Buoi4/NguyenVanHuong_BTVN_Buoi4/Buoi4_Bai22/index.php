<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GPTB2</title>
    
    <style>
        .container{
            width: 400px;
            padding: 20px;
            justify-content: center;
            margin: auto;
            border-radius: 10px;
            background-color: #F5F5DC;
        }
        .kenny{
            width: 20px;
            
        }
        input#result{
            margin-right: 75px;
        }
        .form-group{
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        label{
            flex: 3;
        }
        input[type="text"]{
            flex: 1;
        }
        input[type="submit"]{
            margin-left: 150px;
        }
    </style>
</head>
<body>
    <form action="" method="POST">
        <div class="container">
            <h1>Giải Phương Trình Bậc Hai</h1>
            <div class="form-group">
                <label for="">Phương trình :</label>
                <input class="kenny" type="text" id="a" name="a" required>x^2 + 
                <input class="kenny" type="text" id="b" name="b" required>x +
                <input class="kenny" type="text" name="c" id="c"> = 0
            </div>
            <div class="form-group">
                <label for="">Nghiệm</label>
                <input type="text" id="result" name="result" readonly>
            </div>

            <input type="submit" value="Giải phương trình">
        </div>
    </form>

    <?php
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $a = $_POST['a'];
            $b = $_POST['b'];
            $c = $_POST['c'];

            if($a == 0){
                echo "<script>document.getElementById('result').value='Đây không phải phương trình bậc 2'</script>";
            }else{
                //Tính delta
                $delta = $b*$b-4*$a*$c;

                if($delta > 0){
                    //Phương trình có 2 nghiệm phân biệt
                    $x1 = (-$b+sqrt($delta))/(2*$a);
                    $x2 = (-$b-sqrt($delta))/(2*$a);
                    $result = "x1 = $x1, x2 = $x2";
                }elseif($delta == 0){
                    //Phương trình có nghiệm kép
                    $x = -$b/(2*$a);
                    $result = "x = $x (Nghiệm kép)";
                }else{
                    //Phương trình vô nghiệm
                    $result = "Phương trình vô nghiệm";
                }

                echo "<script>document.getElementById('result').value='$result'</script>";

            }
        }
    ?>
</body>
</html>