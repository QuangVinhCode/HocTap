<?php
    include_once('ketnoi.php');
    $error = NULL;
    if(isset($_POST['submit'])){
        // Bẫy lỗi để trống trường dữ liệu trong Form
        // Tên Sản phẩm
        if($_POST['ten_monhoc'] == ''){
            $error_ten_monhoc = '<span style="color:red;">(*)<span>';
        }
        else{
            $ten_monhoc = $_POST['ten_monhoc'];
        }
        // Ảnh mô tả Sản phẩm
        if($_FILES['subject_content']['name'] == ''){
            $error_subject_content = '<span style="color:red;">(*)<span>';
        }
        else{
            $subject_content = $_FILES['subject_content']['name'];
            $tmp = $_FILES['subject_content']['tmp_name'];
        }
        // Danh mục Sản phẩm
        if($_POST['class_id'] == 'unselect'){
            $error_class_id  = '<span style="color:red;">(*)<span>';
        }
        else{
            $class_id  = $_POST['class_id'];
        }
       

        if(isset($ten_monhoc)  && isset($class_id)){

            move_uploaded_file($tmp, 'pdf/'.$subject_content);
            $sql = "INSERT INTO subject ( subjecttitle, subject_content, class_id) VALUES ('$ten_monhoc','$subject_content','$class_id')";
            $query = mysqli_query($conn, $sql);
            header('location:quantri.php?page_layout=danhsachmonhoc');
        }
    }
?>

<link rel="stylesheet" type="text/css" href="css/themmonhoc.css" />
<h2>thêm mới môn học</h2>
<div id="main">
	<form method="post" enctype="multipart/form-data">
	<table id="add-prd" border="0" cellpadding="0" cellspacing="0">
    	<tr>
        	<td><label>Tên môn học</label><br /><input type="text" name="ten_monhoc" /><?php if(isset($error_ten_monhoc)){echo $error_ten_monhoc;}?></td>
        </tr>
        <tr>
        	<td><label>Nội dung môn học</label><br /><input type="file" name="subject_content" /><?php if(isset($error_subject_content)){echo $error_subject_content;}?></td>
        </tr>
        <tr>
        	<td><label>Lớp học</label><br />
                <select name="class_id">
                <option value="unselect">Chọn lớp học</option>
                    <?php
                       
                        $sqlDm = "SELECT * FROM class";
                        $queryDm = mysqli_query($conn,$sqlDm);
                        while ($arrDm = mysqli_fetch_array($queryDm)) {
                            echo "<option value=".$arrDm['id'].">".$arrDm['classname']." </option>";
                        }
                    ?>
                </select>	
                <?php if(isset($error_class_id)){echo $error_class_id;}?>
            </td>
        </tr>
        <tr>
        	<td><input type="submit" name="submit" value="Thêm mới" /> <input type="reset" name="reset" value="Làm mới" /></td>
        </tr>
    </table>
    </form>
</div>