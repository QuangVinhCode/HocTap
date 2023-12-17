<?php
    include_once('ketnoi.php');
     if(isset($_GET['page'])){
            $page = $_GET['page'];
        }else{
            $page = 1;
        }
        $rowsPerPage = 10;
        $perRow = $page*$rowsPerPage-$rowsPerPage;
    $sql = "SELECT subject.id as id,subjecttitle,classname  FROM subject INNER JOIN class ON subject.class_id = class.id LIMIT $perRow, $rowsPerPage";
    $query = mysqli_query($conn, $sql);
?>
<link rel="stylesheet" type="text/css" href="css/danhsachmonhoc.css" />
<h2>quản lý môn học</h2>
<div id="main">
	<p id="add-prd"><a href="quantri.php?page_layout=themmonhoc"><span>thêm sản phẩm mới</span></a></p>
	<table id="prds" border="0" cellpadding="0" cellspacing="0" width="100%">
    	<tr id="prd-bar">
        	<td width="5%">ID</td>
            <td width="40%">Tên môn học</td>
            <td width="20%">Lớp học</td>
            <td width="5%">Sửa</td>
            <td width="5%">Xóa</td>
        </tr>
        <?php
            while($row = mysqli_fetch_array($query)){
        ?>
        <tr>
        	<td><span><?php echo $row['id'];?></span></td>
            <td class="l5"><a href="#"><?php echo $row['subjecttitle'];?></a></td>
            <td class="l5"><?php echo $row['classname']?></td>  
            <td><a href="quantri.php?page_layout=suamonhoc&id=<?php echo $row['id'];?>"><span>Sửa</span></a></td>
            <td><a href="xoamonhoc.php?id=<?php echo  $row['id'];?>"><span>Xóa</span></a></td>
        </tr>
        <?php
        }
        ?>
    </table>
    <?php
       $totalRows = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM subject"));
       $totalPage = ceil($totalRows/$rowsPerPage);
       $listPage = '';
       for($i=1;$i<=$totalPage;$i++){
            if($i==$page){
                $listPage .= " <span>".$i."</span> ";
            }else{
                $listPage .= ' <a href="'.$_SERVER['PHP_SELF'].'?page_layout=danhsachmonhoc&page='.$i.'">'.$i.'</a> ';
            }
       }
    ?>
    <p id="pagination"><?php echo $listPage;?></p>
</div>