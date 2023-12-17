<?php
    include_once('cauhinh/ketnoi.php');
    $error = NULL;
    if(isset($_POST['submit'])){
        // Bẫy lỗi để trống trường dữ liệu trong Form
        // Tên Sản phẩm
        if($_POST['username'] == ''){
            $error_username = '<span style="color:red;">(*)<span>';
        }
        else{
            $username = $_POST['username'];
        }

        if($_POST['password'] != $_POST['password_again']){
            $error_password = '<span style="color:red;">(*)<span>';
        }
        else{
            $password = $_POST['password'];
        }

        if($_POST['fullname'] == ''){
            $error_fullname = '<span style="color:red;">(*)<span>';
        }
        else{
            $fullname = $_POST['fullname'];
        }

        if($_POST['date'] == ''){
            $error_date = '<span style="color:red;">(*)<span>';
        }
        else{
            $date = $_POST['date'];
        }

        if($_POST['adress'] == ''){
            $error_adress = '<span style="color:red;">(*)<span>';
        }
        else{
            $adress = $_POST['adress'];
        }
        
        if($_POST['phone_number'] == ''){
            $error_phone_number = '<span style="color:red;">(*)<span>';
        }
        else{
            $phone_number = $_POST['phone_number'];
        }

        if($_POST['role_id'] == ''){
            $error_role_id = '<span style="color:red;">(*)<span>';
        }
        else{
            $role_id = $_POST['role_id'];
        }
      
        if(isset($username) && isset($password) && isset($fullname) && isset($date) 
        && isset($adress) && isset($phone_number) && isset($role_id)){
            $sql = "INSERT INTO account ( username, password, fullname,date,adress,phone_number,role_id) 
            VALUES ('$username','$password','$fullname','$date','$adress','$phone_number','$role_id')";
            $query = mysqli_query($conn, $sql);
            header('location:index.php');
        }
    }
?>

<link rel="stylesheet" type="text/css" href="css/dangky.css" />
<h2>Đăng ký</h2>
<div id="main">
	<form method="post" enctype="multipart/form-data">
	<table id="add-prd" border="0" cellpadding="0" cellspacing="0">
    	<tr>
        	<td><label>Tên đăng nhập</label><br /><input type="text" name="username" /><?php if(isset($error_username)){echo $error_username;}?></td>
        </tr>
        <tr>
        	<td><label>Mật khẩu</label><br /><input type="password" name="password" /><?php if(isset($error_password)){echo $error_password;}?></td>
        </tr>
        <tr>
        	<td><label>Nhập lại mật khẩu</label><br /><input type="password" name="password_again" /><?php if(isset($error_password)){echo $error_password;}?></td>
        </tr>
        <tr>
        	<td><label>Họ và tên</label><br /><input type="text" name="fullname" /><?php if(isset($error_fullname)){echo $error_fullname;}?></td>
        </tr>
        <tr>
        	<td><label>Năm sinh</label><br /><input type="date" name="date" /><?php if(isset($error_date)){echo $error_date;}?></td>
        </tr>
        <tr>
        	<td><label>Địa chỉ</label><br /><input type="text" name="adress" /><?php if(isset($error_adress)){echo $error_adress;}?></td>
        </tr>
        <tr>
        	<td><label>Số điện thoại</label><br /><input type="text" name="phone_number" /><?php if(isset($error_phone_number)){echo $error_phone_number;}?></td>
        </tr>
        <tr>
        	<td><label>Loại</label><br /><select name="role_id">
                <option value="2">Giáo viên</option>
                <option value="3">Học viên</option>
            </select><?php if(isset($error_role_id)){echo $error_role_id;}?></td>
        </tr>
        <tr>
        	<td><input type="submit" name="submit" value="Đăng ký" /> <input type="reset" name="reset" value="Làm mới" /></td>
        </tr>
    </table>
    </form>
</div>