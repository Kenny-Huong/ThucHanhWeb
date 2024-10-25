<?php
header("Content-type: text/html; charset=utf-8");
require_once ('config.php');

// Kết nối sql và lưu data vào table
// insert,delete,update
function execute($sql)
{
    $con = mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);
    mysqli_set_charset($con, 'UTF8');
    mysqli_query($con, $sql);
    mysqli_close($con);
}

// Để hiện thị khi select
function executeResult($sql)
{
    $con = mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);
    mysqli_set_charset($con, 'UTF8');
    $result = mysqli_query($con, $sql);
    $data = [];
    
    while ($row = mysqli_fetch_array($result,1))
    {
      
        $data[] = $row;
    }
  
    mysqli_close($con);
    return $data;
}