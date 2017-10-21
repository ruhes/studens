<?php
    $index = $_GET['index'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>$Title$</title>
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>

    <?php include_once 'header.php'?>

    <?php
        switch ($index) {
        case 'look';
            include 'look_student.php';
            break;
        case 'add';
            include 'add_student.php';
            break;
        case 'edit';
            include 'edit_student.php';
            break;
        }
        if(isset($_GET['send'])){
            include 'search_student.php';
        }
    ?>

</body>
</html>