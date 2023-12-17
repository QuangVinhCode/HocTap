<div class="l-sidebar">
    <h2>hãng điện thoại</h2>
    <ul id="main-menu">
        <?php
        include_once 'cauhinh/ketnoi.php'; // Include the connection file

        $sql = "SELECT * FROM class";
        $query = mysqli_query($conn, $sql); // Use mysqli_query instead of mysql_query
        while ($row = mysqli_fetch_array($query)) {
            ?>
            <li><a href="nguoidung.php?page_layout=danhsachmonhoc&class_id=<?php echo $row['id'] ?>&classname=<?php echo $row['classname'] ?>"><?php echo $row['classname'] ?></a></li>
        <?php
        }
        ?>
    </ul>
</div>
