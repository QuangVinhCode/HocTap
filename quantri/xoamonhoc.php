<?php
	session_start();
	include_once('ketnoi.php');
	if(isset($_SESSION['tk'])){
		$id_sp = $_GET['id'];
		$sql = "DELETE FROM subject WHERE id = $id_sp";
		$query = mysqli_query($conn, $sql);
		header('location:quantri.php?page_layout=danhsachmonhoc');
	}else{
		header('location:index.php');
	}
?>