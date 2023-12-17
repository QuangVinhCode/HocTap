<?php
session_start();
include_once('ketnoi.php');

$error = NULL;
if (isset($_POST['submit'])) {
    if ($_POST['tk'] == "" || $_POST['mk'] == "") {
        $error = "Vui lòng nhập tài khoản và mật khẩu";
    } else {
        $tk = $_POST['tk'];
        $mk = $_POST['mk'];

        // Check if the column names are correct in your database table
        $sql = "SELECT * FROM account WHERE username ='$tk' AND password = '$mk'";
        $query = mysqli_query($conn, $sql);

        // Check if the query was successful
        if ($query) {
            $rows = mysqli_num_rows($query);

            if ($rows <= 0) {
                $error = 'Tài khoản hoặc mật khẩu chưa đúng';
            } else {
                $_SESSION['tk'] = $tk;
                $_SESSION['mk'] = $mk;
                header('location:quantri.php');
            }
        } else {
            // Handle query execution error
            $error = 'Error executing the query: ' . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf8" />
    <title>Vietpro Mobile Shop - Đăng nhập hệ thống</title>
    <link rel="stylesheet" type="text/css" href="css/dangnhap.css" />
</head>
<body>
    <?php
    if (!isset($_SESSION['tk'])) {
    ?>
        <form method="post">
            <div id="form-login">
                <h2>đăng nhập hệ thống quản trị</h2>
                <center><span style="color:red;"><?php echo $error; ?></span></center>
                <ul>
                    <li><label>tài khoản</label><input type="text" name="tk" /></li>
                    <li><label>mật khẩu</label><input type="password" name="mk" /></li>
                    <li><label>ghi nhớ</label><input type="checkbox" name="check" checked="checked" /></li>
                    <li><input type="submit" name="submit" value="Đăng nhập" /> <input type="reset" name="resset" value="Làm mới" /></li>
                </ul>
            </div>
        </form>
    <?php
    } else {
        header('location:quantri.php');
    }
    ?>
</body>
</html>
