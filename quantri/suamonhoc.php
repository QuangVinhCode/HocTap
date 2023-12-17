<?php
    include_once('ketnoi.php');
    $id_sp = $_GET['id'];
    $sql = "SELECT * FROM subject WHERE id = $id_sp";
    $query = mysqli_query($conn,$sql);
    while ($arr = mysqli_fetch_array($query)) {
?>
<link rel="stylesheet" type="text/css" href="css/suamonhoc.css" />
<h2>sửa thông tin sản phẩm</h2>
<div id="main">
	<form method="post" enctype="multipart/form-data">
	<table id="add-prd" border="0" cellpadding="0" cellspacing="0">
    	<tr>
        	<td><label>Tên môn học</label><br /><input type="text" name="ten_monhoc" value="<?php if(isset($_POST['subjecttitle'])){echo $_POST['subjecttitle'];}else{echo $arr['subjecttitle'];}?>" /></td><?php if(isset($error_ten_monhoc)){echo $error_ten_monhoc;}?>
        </tr>
        <tr>
        	<td><label>Nội dung</label><br /><input type="file" name="subject_content" /><input type="text"  disabled name="subject_content" value="<?php echo $arr['subject_content'];?>" /></td>
        </tr>
        <tr>
        	<td><label>Lớp học</label><br />
            	<select name="class_id">
                    <?php  
                            $id_tmp = $arr['class_id'];
                            $sqlclass = "SELECT * FROM class WHERE id = $id_tmp";
                            $queryclass= mysqli_query($conn,$sqlclass);
                            $classData = mysqli_fetch_array($queryclass);
                            echo "<option value=".$classData['id'].">".$classData['classname']." </option>";                                    
                    ?>
                    <?php
                       
                        $sqlDm = "SELECT * FROM class";
                        $queryDm = mysqli_query($conn,$sqlDm);
                        while ($arrDm = mysqli_fetch_array($queryDm)) {
                            echo "<option value=".$arrDm['id'].">".$arrDm['classname']." </option>";
                        }
                    ?>
                </select>	
            </td>
        </tr>
        <tr>
        	<td><input type="submit" name="submit" value="Cập nhật" /> <input type="reset" name="reset" value="Làm mới" /></td>
        </tr>
    </table>
    </form>
</div>
<?php
}
?>
<?php
    if(isset($_POST['submit'])){
               // Tên Sản phẩm
        if($_POST['ten_monhoc'] == ''){
            $error_ten_monhoc = '<span style="color:red;">(*)<span>';
        }
        else{
            $ten_monhoc = $_POST['ten_monhoc'];
        }     
        // Ảnh mô tả Sản phẩm
        if($_FILES['subject_content']['name'] == ''){
            $subject_content = $_POST['subject_content'];
        }
        else{
            $subject_content = $_FILES['subject_content']['name'];
            $tmp = $_FILES['subject_content']['tmp_name'];
        }
        // Danh mục Sản phẩm
            $class_id = $_POST['class_id'];
        // Xử lý Sửa Thông tin Sản phẩm
        if(isset($ten_monhoc) && isset($class_id)){
            if($_FILES['subject_content']['name'] != ""){
                move_uploaded_file($tmp, 'pdf/'.$subject_content);
            }  
            $sqlUpdate = "UPDATE subject  SET     class_id  = $class_id,
                                            subjecttitle = '$ten_monhoc',
                                            subject_content ='$subject_content'                                         
                                    WHERE   id = $id_sp";
            $queryUpdate = mysqli_query($conn,$sqlUpdate);
            header('location:quantri.php?page_layout=danhsachmonhoc');
        }
    }
?>