<?php
require_once ('../db/dbhelper.php');
?>
<!DOCTYPE html>
<html lang="vi">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> MOWO - MOTO WORLD </title>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="../CSS/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="../CSS/shop-homepage.css" rel="stylesheet">
  <link rel="stylesheet" href="../CSS/newcss.css" type="text/css"/>
  <script src="../JS/scripts.js" type="text/javascript"> </script> 
    <!-- Bootstrap core JavaScript -->
  <script src="../JS/jquery.min.js"></script>
  <script src="../JS/bootstrap.bundle.min.js"></script>


</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">  MOWO <i class="fa fa-motorcycle logo-icon"></i> </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">           
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="home.php">TRANG CHỦ
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"> DỊCH VỤ </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Page Content -->
  <div class="container">

    <div class="row">                       
      <div class="col-lg-3">
        <br>
        <div class="list-group">
          <?php
            // lấy dữ liệu hãng ra
            $sql = 'select * from hang';   
            $categoryList = executeResult($sql);
            $index = 1;
            foreach ($categoryList as $item)
            {
                echo '<a class="list-group-item" href="sanpham.php?tenhang='.$item['tenhang'].'"> <img class="d-block img-fluid" src='.$item['logo'].' alt="Khong tai duoc"> </a>  <p> </p>';                                            
            }
           ?>        
        </div>
      </div>
        <?php
            $tenhang = $_GET['tenhang']; 
            $id = $_GET['id'];  
            // lấy dữ liệu hãng ra
            $sql = "SELECT * FROM sanpham where id = $id";   
            $categoryList = executeResult($sql);
            foreach ($categoryList  as $item)
            {
            echo'
      <div class="col-lg-9">
        <center>
        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">       
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img class="d-block img-fluid" src='.$item['hinhanh'].'  alt="Firstslide">
                <h2 style="color: firebrick;"> '.$item['tensp'].' </h2>
                <h5> Giá: '.$item['gia'].' $</h5>     
                    
                <form onsubmit = "return donhang()" action="dathang.php">
                        <input type="hidden" name="id" id="id" value="'.$item['id'].'"/>
                        <input type="hidden" name="tensp" id="tensp" value="'.$item['tensp'].'"/>
                        <input type="hidden" name="gia" id="gia" value="'.$item['gia'].'"/>
                        <input type="hidden" name="hinhanh" id="hinhanh" value="'.$item['hinhanh'].'"/>
                        Số lượng : <input type="number" name="soluong" id="soluong" value="1"/>                     
                        <button class="btn btn-primary" type="submit">
                            <i class="fa fa-shopping-cart"> </i> 
                        </button>
                </form>
            </div>                       
          </div>       
        </div> 
        </center>  
     
        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                <table class="table table-striped table-bordered table-list">
                    <tbody>
                        <tr> 
                            <td> <strong> Dài x Rộng x Cao : </strong> '.$item['kichthuoc'].' </td> 
                            <td> <strong> Độ cao yên : </strong> '.$item['chieucaoyen'].' </td>                     
                        </tr>
                        <tr> 
                            <td> <strong> Cỡ lốp trước/sau : </strong> '.$item['sizebanh'].' </td> 
                            <td> <strong> Loại động cơ : </strong> '.$item['engine'].' </td>                     
                        </tr>
                        <tr> 
                            <td> <strong> Dung tích xy-lanh : </strong> '.$item['CC'].' </td> 
                            <td> <strong> Công suất tối đa : </strong> '.$item['congsuat'].' </td>                     
                        </tr>
                        <tr> 
                            <td> <strong> Dung tích nhớt máy : </strong> '.$item['CCnhot'].' </td> 
                            <td> <strong> Dung tích xăng : </strong> '.$item['CCxang'].' </td>                     
                        </tr>
                        <tr> 
                            <td> <strong> Phanh trước/sau: </strong> '.$item['phanh'].' </td> 
                            <td> <strong> Hộp số : </strong> '.$item['gear'].' </td>                      
                        </tr>
                    </tbody>
                </table>    
        </div>           
        </div> ';}?>  
        
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; MOWO - MOTO WORLD 2020</p>
    </div>
    <!-- /.container -->
  </footer>
</body>

</html>
