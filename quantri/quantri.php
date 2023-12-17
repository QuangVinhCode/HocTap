<?php
    session_start();
    include_once('ketnoi.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Vietpro Mobile Shop - Trang chủ quản trị</title>
<link rel="stylesheet" type="text/css" href="css/quantri.css" />
</head>
<body>
<div id="wrapper">
	<div id="header">
    	<div id="navbar">
        	<ul>
            	<li id="admin-home"><a href="quantri.php">trang chủ quản trị</a></li>
                <li><a href="quantri.php?page_layout=thanhvien">thành viên</a></li>
                <li><a href="quantri.php?page_layout=danhmucsp">danh mục sản phẩm</a></li>
                <li><a href="quantri.php?page_layout=danhsachmonhoc">sản phẩm</a></li>
                
            </ul>
            <div id="user-info">
            	<p>Xin chào <span><?php echo $_SESSION['tk'];?></span> đã đăng nhập vào hệ thống</p>
                <p><a href="dangxuat.php">Đăng xuất</a></p>
            </div>
        </div>
        <div id="banner">
        	<div id="logo"><a href="#"><img src="anh/logo.png" /></a></div>
        </div>
    </div>
    <div id="body">
       <?php
      if(isset($_GET['page_layout'])){
        switch ($_GET['page_layout']){
           case 'themmonhoc': include_once('themmonhoc.php');break;
           case 'suamonhoc': include_once('suamonhoc.php');break;
           case 'danhsachmonhoc': include_once('danhsachmonhoc.php');break;
           
        }
    }else{
        include_once('gioithieu.php');
    }
       ?>	
    
    </div>
    <div id="footer">
    	<div id="footer-info">
            <h4>Quang Vinh & Duy Tấn</h4>
        </div>
    </div>
</div>
</body>
</html>
