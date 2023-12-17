<link rel="stylesheet" type="text/css" href="css/danhsachsp.css" />
<div class="prd-block">
	<h2><?php
     include_once 'cauhinh/ketnoi.php';
        $ten_dm = $_GET['classname'];
        echo $ten_dm;
    ?></h2>
    <div class="pr-list">
    <?php
        $id_dm = $_GET['class_id'];
        //Số bản ghi trên trang
        $rowPerPage = 12;
        //Số trang
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }else{
            $page = 1;
        }
        //Vị trí
        $perRow = $page*$rowPerPage-$rowPerPage;
        $sql = "SELECT * FROM subject WHERE class_id = $id_dm LIMIT $perRow,$rowPerPage";
        $query = mysqli_query($conn, $sql);
        //Tổng số bản ghi
        $totalRow = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM subject WHERE class_id = $id_dm"));
        //Tổng số trang
        $totalPage = Ceil($totalRow/$rowPerPage);
        $listPage = '';
        //Nút trang trước và trang đầu
        if($page>1){
            $listPage .= '<a href="nguoidung.php?page_layout=danhsachmonhoc&class_id='.$id_dm.'&classname='.$ten_dm.'&page=1"> First </a>';
            $prev = $page-1;
            $listPage .= '<a href="nguoidung.php?page_layout=danhsachmonhoc&class_id='.$id_dm.'&classname='.$ten_dm.'&page='.$prev.'"> << </a>';
        }
        //Các phím số
        for($i=1;$i<=$totalPage;$i++){
            if($i==$page){
                $listPage .=  '<span> '.$i.' </span>';
            }else{
                $listPage .= '<a href="nguoidung.php?page_layout=danhsachmonhoc&class_id='.$id_dm.'&classname='.$ten_dm.'&page='.$i.'"> '.$i.' </a>';
            }
        }
        //Nút trang sau và trang cuối
        if($page<$totalPage){
            $next = $page+1;
            $listPage .= '<a href="nguoidung.php?page_layout=danhsachmonhoc&class_id='.$id_dm.'&classname='.$ten_dm.'&page='.$next.'"> >> </a>';
            $listPage .= '<a href="nguoidung.php?page_layout=danhsachmonhoc&class_id='.$id_dm.'&classname='.$ten_dm.'&page='.$totalPage.'"> Last </a>';
           
        }
        $i=0;
        while($row = mysqli_fetch_array($query)){
    ?>
    	<div class="prd-item"> 
            <h3><a href="nguoidung.php?page_layout=chitietmonhoc&id=<?php echo $row['id'] ?>"><?php echo $row['subjecttitle'] ?></a></h3>            
        </div>
    <?php
        $i++;
        if($i%3==0){
            echo '<div class="clear"></div>';
        }
        }
    ?>
        <div class="clear"></div>
    </div>
</div>

<div id="pagination"><?php echo $listPage ?></div>
