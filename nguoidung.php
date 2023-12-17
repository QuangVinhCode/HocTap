<?php
    session_start();
    include_once('cauhinh/ketnoi.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Study Web- Website Học Tập Trực Tuyến</title>
<link rel="stylesheet" type="text/css" href="css/trangchu.css" />

<link rel="stylesheet" type="text/css" href="css/slideshow.css" />

<script type="text/javascript" src="js/jquery-1.2.6.min.js"></script>

<script type="text/javascript">

/*** 
    Simple jQuery Slideshow Script
    Released by Jon Raasch (jonraasch.com) under FreeBSD license: free to use or modify, not responsible for anything, etc.  Please link out to me if you like it :)
***/

function slideSwitch() {
    var $active = $('#slideshow IMG.active');

    if ( $active.length == 0 ) $active = $('#slideshow IMG:last');

    // use this to pull the anh in the order they appear in the markup
    var $next =  $active.next().length ? $active.next()
        : $('#slideshow IMG:first');

    // uncomment the 3 lines below to pull the anh in random order
    
    // var $sibs  = $active.siblings();
    // var rndNum = Math.floor(Math.random() * $sibs.length );
    // var $next  = $( $sibs[ rndNum ] );


    $active.addClass('last-active');

    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 1000, function() {
            $active.removeClass('active last-active');
        });
}

$(function() {
    setInterval( "slideSwitch()", 2000 );
});

</script>

</head>
<body>

<!-- Wrapper -->
<div id="wrapper">
	<!-- Header -->
    <div id="header">
    	<div id="search-bar">
        	<!--Tìm kiếm-->
            <?php
                include_once('chucnang/timkiem/timkiem.php');
            ?>
            <!--Giỏ hàng-->
        </div>
        <div id="main-bar">
        	<div id="logo"><a href="nguoidung.php"><img src="anh/logo.png" /></a></div>
            <div id="banner"></div>
        </div>
        <div id="navbar">
        	<ul>
            	<li id="menu-home"><a href="nguoidung.php">trang chủ</a></li>
                <li><a href="nguoidung.php?page_layout=gioithieu">giới thiệu</a></li>
                <li><a href="nguoidung.php?page_layout=dichvu">dịch vụ</a></li>
                <li><a href="nguoidung.php?page_layout=lienhe">liên hệ</a></li>
                <li> <div id="user-info">
            	<p>Xin chào <span><?php echo $_SESSION['tk'];?></span> <a href="dangxuat.php">Đăng xuất</a></p>
            </div></li>
            </ul>        
        </div>
        
    </div>
    <!-- End Header -->
    <!-- Body -->
    <div id="body">
    	<!-- Left Column -->
    	<div id="l-col">        	
           
            <!--Danh mục-->
            <?php
                include_once('chucnang/sanpham/danhmuclop.php');
            ?>            
            <!--Thống kê-->
            <?php
                include_once('chucnang/thongke/thongke.php');
            ?>
            <!-- <div class="l-sidebar"></div> -->
        </div>
        <!-- End Left Column -->
        
        <!-- Right Column -->
        <div id="r-col">
        	<!--slideshow-->
            <!-- <?php
                include_once('chucnang/slideshow/slideshow.php');
            ?> -->
            <div id="main">
            	<?php
                if(isset($_GET['page_layout'])){
                    switch($_GET['page_layout']){
                        case 'gioithieu':include_once('chucnang/menungang/gioithieu.php');break;
                        case 'dichvu':include_once('chucnang/menungang/dichvu.php');break;
                        case 'lienhe':include_once('chucnang/menungang/lienhe.php');break;
                        case 'chitietmonhoc':include_once('chucnang/sanpham/chitietmonhoc.php');break;
                        case 'danhsachmonhoc':include_once('chucnang/sanpham/danhsachmonhoc.php');break;
                        case 'danhsachtimkiem':include_once('chucnang/timkiem/danhsachtimkiem.php');break;                   
                    }
                }else{
                    include_once('chucnang/menungang/gioithieu.php');
                }
                ?>
            </div>
        </div>
        <!-- End Right Column -->
    	    
        <div id="brand"></div>
    </div>
    <!-- End Body -->
    <!-- Footer -->
    <div id="footer">
    	<div id="footer-info">
        	<h4>Quang Vinh & Duy Tấn</h4>   
        </div>
    </div>
    <!-- End Footer -->
</div>
<!-- End Wrapper -->

</body>
</html>
