<link rel="stylesheet" type="text/css" href="css/chitietsp.css" />
<div class="prd-block">
    <div class="prd-only">
    <?php
         include_once 'cauhinh/ketnoi.php';
        $id_sp = $_GET['id'];
        $sql = "SELECT * FROM subject WHERE id = $id_sp";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($query);
    ?>
        <div class="prd-intro">
        	<h1><?php echo $row['subjecttitle'] ?></h1>
           
        </div>
    	<div class="prd-pdf">
        <embed src="quantri/pdf/<?php echo $row['subject_content'] ?>" type="application/pdf" width="100%" height="600px" />
        </div>	
        
        
        <div class="clear"></div>
        
        <div class="prd-details">
       
        </div>
    </div>
    
</div>               
