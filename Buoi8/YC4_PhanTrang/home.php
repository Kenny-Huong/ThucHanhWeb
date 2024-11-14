<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            justify-content: center;
            align-items: center;
            text-align: center;

        }
        .pagination {
            margin-top: auto;
            justify-content: center;
        }
        .page-container {
            display: none; /* Ẩn tất cả các trang ban đầu */
            margin-top: 20px;
        }
        .page {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            margin-bottom: 20px;
        }
        .line {
            border-bottom: 1px solid #000; /* Dòng kẻ màu đen */
            padding: 10px 0;
            font-size: 16px;
            line-height: 1.5;
            cursor: text;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Nguyễn Văn Hướng - DHTI15A5HN - 21103100115</h1>
        <h2>Quản lý trang - Class Page</h2>
        
        <!-- 4 trang, mỗi trang 8 dòng -->
        <?php for ($page = 1; $page <= 4; $page++): ?>
            <div class="page-container" id="page-<?php echo $page; ?>">
                <div class="page">
                    <?php for ($line = 1; $line <= 8; $line++): ?>
                        <div class="line" contenteditable="true"></div>
                    <?php endfor; ?>
                </div>
            </div>
        <?php endfor; ?>

        <!-- Phân trang -->
        <div class="pagination">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php for ($page = 1; $page <= 4; $page++): ?>
                        <li class="page-item">
                            <a class="page-link" href="#" onclick="showPage(<?php echo $page; ?>)"><?php echo $page; ?></a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </nav>
        </div>
    </div>

    <script>
        // Hiển thị trang đầu tiên mặc định
        document.getElementById("page-1").style.display = "block";

        // Hàm hiển thị trang dựa trên số trang
        function showPage(pageNumber) {
            // Ẩn tất cả các trang
            const pages = document.querySelectorAll(".page-container");
            pages.forEach(page => page.style.display = "none");

            // Hiển thị trang đã chọn
            document.getElementById("page-" + pageNumber).style.display = "block";
        }
    </script>
</body>
</html>
