<?php

    if(empty($_GET['keyWorld']) || !isset($_GET['keyWorld'])){
        echo '<script>alert("学生信息不能为空");history.back();</script>';
    }
    require_once 'config.php';
    //先获取多少条数据
    $keyWorld = $_GET['keyWorld'];
    $query = "SELECT * FROM student WHERE (id LIKE '$keyWorld' OR name LIKE '%$keyWorld%'
            OR age='$keyWorld' OR sex='$keyWorld' OR grade LIKE '%$keyWorld%' OR class LIKE '%$keyWorld%')";
    $result = mysqli_query($conn,$query);
    $number = mysqli_num_rows($result);
    //分页
    $page = $_GET['page'];
    !isset($page) ? $page = 1 : null;
    if($page==1){
        $page = 0;
    } else {
        $page = $page;
        $page = $page*20-20;
    }

    $keyWorld = $_GET['keyWorld'];
    $query = "SELECT * FROM student WHERE (id LIKE '$keyWorld' OR name LIKE '%$keyWorld%'
        OR age='$keyWorld' OR sex='$keyWorld' OR grade LIKE '%$keyWorld%' OR class LIKE '%$keyWorld%') LIMIT $page,20";
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
    <script>
        window.onload = function () {
            var del = document.getElementsByName('del');
            for(var i=0;i<del.length;i++){
                del[i].onclick = function () {
                    if( confirm('确定要删除吗?')) {
                        location.href=this.href;
                    } else {
                        return false;
                    }
                }
            }
        }
    </script>
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
            if(!isset($id) || empty($id)){
                echo '<script>alert("没有匹配");history.back();</script>';
            }
            for($i=0;$i<count($id);$i++){
                echo "
                <tr>
                    <td>$id[$i]</td>
                    <td>$name[$i]</td>
                    <td>$age[$i]</td>
                    <td>$sex[$i]</td>
                    <td>$grade[$i]</td>
                    <td>$class[$i]</td>
                    <td><a href='index.php?index=edit&id=$id[$i]'>修改</a></td>
                    <td><a name='del' href='delete_student.php?id=$id[$i]'>删除</a></td>
                </tr>
                ";
            }
        ?>
    </table>
    <?php if($number>=20) { ?>
        <div id="page">共有<?php echo $number?>条记录 共<?php echo ceil($number/20)?>页
            <?php for($i=1;$i<=(ceil($number/20));$i++){
                echo "<a href=\"index.php?keyWorld=$keyWorld&send=搜索&page=$i\">[$i]</a>";
            } ?>
        </div>
    <?php } else { ?>
        <div id="page">共有<?php echo $number?>条记录</div>
    <?php } ?>
</body>
</html>