<?php
require_once ('../db/dbhelper.php');

if(!empty($_POST)){
    
    $hovaten = '';
    $sdt = '';
    $email = '';
    $diachi = '';
    
    if(isset($_POST['hovaten']) && isset($_POST['sdt']) && isset($_POST['email']) && isset($_POST['diachi']))
    {
        $hovaten = $_POST['hovaten'];
        $sdt = $_POST['sdt'];
        $email = $_POST['email'];
        $diachi = $_POST['diachi'];
        $ghichu = $_POST['ghichu'];
        $soluong = $_GET['soluong']; 
        $tensp = $_GET['tensp'];  
    }
    
    if(!empty($hovaten) && !empty($sdt) && !empty($email) && !empty($diachi)){
        $sql = 'INSERT INTO donhang VALUES (NULL,"'.$tensp.'",'.$soluong.',"'.$hovaten.'","'.$sdt.'","'.$email.'","'.$diachi.'","'.$ghichu.'")';
    execute($sql);

    header('Location: xemdonhang.php');
    die();
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title> MOWO - MOTO WORLD </title>
        <link href="../CSS/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../JS/scripts.js"></script>
        
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">ĐẶT HÀNG</h3></div>
                                    <div class="card-body">
                                        <form method="post" onsubmit="return dathang()">
                                            <div class="form-row">
                                               <div class="col-md-6">
                                                    <div class="form-group">
                                                    <?php 
                                                    $hinhanh = $_GET['hinhanh']; 
                                                    
                                                    echo '<img class="d-block img-fluid" src='.$hinhanh.'  alt="Firstslide">';     
                                                    ?> 
                                                    </div>
                                               </div>
                                               <div class="col-md-6">
                                                    <div class="form-group">
                                                    <?php
                                                    $gia = $_GET['gia']; 
                                                    $soluong = $_GET['soluong']; 
                                                    $hinhanh = $_GET['hinhanh']; 
                                                    $tensp = $_GET['tensp'];  
                                                    $tongtien = $soluong * $gia;
                                                    
                                                    echo '<h2 style="color: firebrick;">  '.$tensp.' </h2> <br>'; 
                                                    echo '<h6>Đơn giá:&emsp;&emsp;  '.$gia.'$ </h6>'; 
                                                    echo '<h6>Số lượng đặt: &emsp;  '.$soluong.' </h6>'; 
                                                    echo '<h6>Tổng tiền:&emsp;&nbsp; '.$tongtien.'$ </h6>'; 
                                                    ?> 
                                                    </div>
                                               </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">Họ và tên</label>
                                                        <input class="form-control py-4" id="hovaten" name="hovaten" type="text"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1"> Số điện thoại </label>
                                                        <input class="form-control py-4" pattern="[0-9]{10}" title="Phải nhập số trong khoảng 0-9" id="sdt" name="sdt" type="text"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-4" id="email" name="email" type="email" aria-describedby="emailHelp"/>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Địa chỉ *(Vui lòng ghi rõ SỐ NHÀ, PHƯỜNG/XÃ, QUẬN/HUYỆN, TỈNH/THÀNH PHỐ)</label>
                                                <input class="form-control py-4" id="diachi" name="diachi" type="text" aria-describedby="emailHelp"/>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Ghi chú </label>
                                                <input class="form-control py-4" id="ghichu" name="ghichu" type="text" aria-describedby="emailHelp"/>
                                            </div>
                                            
                                            <div class="form-group mt-4 mb-0">
                                                <input type="submit" class="btn btn-primary btn-block" value="Đặt hàng ">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; MOWO - MOTO WORLD 2020</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>       
    </body>
</html>
