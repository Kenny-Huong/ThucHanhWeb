<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-5 ">
                <h1>Danh Sách Loại Hàng</h1>
                <?php
                $conn = new mysqli('localhost:3366','root','','ql_loaihang');
                if ($conn->connect_error) {
                    die('Kết nối thất bại'. $conn->connect_error);
                }
                
                $sql = 'SELECT * FROM danhsach';
                $result = $conn->query($sql);

                //Kiểm tra và hiển thị dữ liệu trong bảng HTML
                if ($result->num_rows > 0) {
                    echo"
                        <table class='table table-striped'>
                            <tr>
                                <th>STT</th>
                                <th>Mã Loại</th>
                                <th>Tên Loại</th>
                            </tr>";
                    //Duyệt qua các dòng dữ liệu
                    while($row = $result->fetch_assoc()) {
                        echo"<tr>
                            <td>".$row["STT"]."</td>
                            <td>".$row["maLoai"]."</td>
                            <td>".$row["tenLoai"]."</td>
                        </tr>";
                    }       
                    echo"</table>";
                }else{
                    echo "Không có dữ liệu của bảng";
                }
                $conn->close();
                ?>
                <button class="">Thêm mới</button>
            </div>
        </div>
    </div>
</body>
</html>