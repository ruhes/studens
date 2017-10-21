<?php

    $id = $_GET['id'];

    require_once 'config.php';
    $query = "DELETE FROM student WHERE student.id = $id";
    mysqli_query($conn,$query);
    echo '<script>alert("删除成功");location.href="index.php?index=look&page=1";</script>';