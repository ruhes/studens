<?php

    if(isset($_POST['send'])){
        require_once 'config.php';
        $name = $_POST['name'];
        $age = $_POST['age'];
        $sex = $_POST['sex'];
        $grade = $_POST['grade'];
        $class = $_POST['class'];
        if(isset($name) && !empty($name)){
            $query = "INSERT INTO student (name,age,sex,grade,class)
        VALUE ('$name','$age','$sex','$grade','$class')";
            mysqli_query($conn,$query);
            echo '<script>alert("添加成功");</script>';
        } else {
            echo '<script>alert("姓名不能为空");</script>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>$Title$</title>
</head>
<body>
    <form id="addForm" method="post">
        <div>姓名：<input type="text" name="name"></div>
        <div>年龄：<input type="text" name="age"></div>
        <div>性别：<input type="radio" name="sex" value="男" checked="checked">男
            <input type="radio" name="sex" value="女">女</div>
        <div>年级：
            <select name="grade">
                <option>请选择</option>
                <option>高中一年级</option>
                <option>高中二年级</option>
                <option>高中三年级</option>
                <option>大学一年级</option>
                <option>大学二年级</option>
                <option>大学三年级</option>
                <option>大学四年级</option>
            </select>
        </div>
        <div>班级：<input type="text" name="class"></div>
        <div class="bottom"><input type="submit" name="send" value="添加">
            <input type="submit" value="重置"></div>
    </form>
</body>
</html>