<?php

    require_once 'config.php';
    //查询共有多少记录
    $query = "SELECT id FROM student";
    $number = mysqli_num_rows(mysqli_query($conn,$query));

    //分页
    $page = $_GET['page'];
    if($page==1){
        $page = 0;
    } else {
        $page = $page;
        $page = $page*20-20;
    }

    $query = "SELECT * FROM student LIMIT $page,20";
    $result = mysqli_query($conn,$query);
    while ($data = mysqli_fetch_assoc($result)) {
        $id[] = $data['id'];
        $name[] = $data['name'];
        $age[] = $data['age'];
        $sex[] = $data['sex'];
        $grade[] = $data['grade'];
        $class[] = $data['class'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>$Title$</title>
</head>
<body>
    <table>
        <tr>
            <td>学号</td>
            <td>姓名</td>
            <td>年龄</td>
            <td>性别</td>
            <td>年级</td>
            <td>班级</td>
        </tr>
        <?php
        for($i=0;$i<count($id);$i++){
            echo "
                <tr>
                    <td>$id[$i]</td>
                    <td>$name[$i]</td>
                    <td>$age[$i]</td>
                    <td>$sex[$i]</td>
                    <td>$grade[$i]</td>
                    <td>$class[$i]</td>
                </tr>
            ";
        }
        ?>
    </table>
    <div id="page">共有<?php echo $number?>条记录 共<?php echo ceil($number/20)?>页
        <?php for($i=1;$i<=(ceil($number/20));$i++){
            echo "<a href=\"index.php?index=look&page=$i\">[$i]</a>";
        } ?>
    </div>
</body>
</html>