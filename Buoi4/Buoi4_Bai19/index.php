<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm Số Nguyên Tố</title>
    <script>
        function hienThiKQ(primes){
            document.getElementById('result').value = primes; 
        }
    </script>
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container{
            background-color: #db95b7;
            text-align: center;
            width: 350px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class = "container">
        <h1>TÌM SỐ NGUYÊN TỐ</h1>
        <form method="POST" action="">
            <label for="">Nhập N :</label>
            <input type="text" id="n" name="n">
            <br>
            <input type="submit" value="Các số nguyên tố <= N"><br>
            <input type="text" id="result" name="result" readonly>
        </form>
    </div>

    <?php
        // Hàm kiểm tra số nguyên tố
        function laSNT($num){
            if($num < 2){
                return false;
            }
            for($i = 2; $i <= sqrt($num); $i++){
                if($num % $i == 0){
                    return false;
                }
            }
            return true;
        }
        
        // Xử lý khi form được gửi
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $n = intval($_POST['n']);  // Lấy giá trị n từ form

            if($n > 1){
                $soNT = [];
                for ($i = 2; $i <= $n; $i++) { 
                    if (laSNT($i)) {  // Gọi hàm với tham số $i
                        $soNT[] = $i;  // Thêm số nguyên tố vào mảng
                    }
                }
                $ketQua = implode(",", $soNT);  // Tạo chuỗi kết quả
                echo "<script>hienThiKQ('$ketQua');</script>";  // Hiển thị kết quả trong ô input
            } else {
                echo "<script>hienThiKQ('Vui lòng nhập số nguyên lớn hơn 1');</script>";
            }
        }
    ?>
</body>
</html>
