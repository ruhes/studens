<?php

    require_once 'config.php';
    $id = $_GET['id'];
    $query = "SELECT * FROM student WHERE id='$id'";
    $result = mysqli_query($conn,$query);
    $data = mysqli_fetch_assoc($result);

    if(isset($_POST['send'])){
        $name = $_POST['name'];
        $age = $_POST['age'];
        $sex = $_POST['sex'];
        $grade = $_POST['grade'];
        $class = $_POST['class'];
        if(isset($name) && !empty($name)){
            echo $name.$id;
            $query = "UPDATE student SET name = '$name' WHERE id = '$id'";
            mysqli_query($conn,$query);
            $query = "UPDATE student SET age = '$age' WHERE id = '$id'";
            mysqli_query($conn,$query);
            $query = "UPDATE student SET sex = '$sex' WHERE id = '$id'";
            mysqli_query($conn,$query);
            $query = "UPDATE student SET grade = '$grade' WHERE id = '$id'";
            mysqli_query($conn,$query);
            $query = "UPDATE student SET class = '$class' WHERE id = '$id'";
            mysqli_query($conn,$query);
            echo '<script>alert("修改成功");history.back();</script>';
        } else {
            echo '<script>alert("姓名不能为空");</script>';
        }
    }

    if(isset($_POST['back'])){
        echo '<script>window.history.go(-2);</script>';
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
        <div>姓名：<input type="text" name="name" value="<?php echo $data['name']?>"></div>
        <div>年龄：<input type="text" name="age" value="<?php echo $data['age']?>"></div>
        <div>性别：<input type="radio" name="sex" value="男"  <?php if($data['sex']=='男') echo 'checked=\'checked\'';?>>男
            <input type="radio" name="sex" value="女" <?php if($data['sex']=='女') echo 'checked=\'checked\'';?>>女</div>
        <div>年级：
            <select name="grade">
                <option>请选择</option>
                <option <?php if($data['grade']=='高中一年级') echo 'selected=\'selected\'';?>>高中一年级</option>
                <option <?php if($data['grade']=='高中二年级') echo 'selected=\'selected\'';?>>高中二年级</option>
                <option <?php if($data['grade']=='高中三年级') echo 'selected=\'selected\'';?>>高中三年级</option>
                <option <?php if($data['grade']=='大学一年级') echo 'selected=\'selected\'';?>>大学一年级</option>
                <option <?php if($data['grade']=='大学二年级') echo 'selected=\'selected\'';?>>大学二年级</option>
                <option <?php if($data['grade']=='大学三年级') echo 'selected=\'selected\'';?>>大学三年级</option>
                <option <?php if($data['grade']=='大学四年级') echo 'selected=\'selected\'';?>>大学四年级</option>
            </select>
        </div>
        <div>班级：<input type="text" name="class" value="<?php echo $data['class']?>"></div>
        <div class="bottom"><input type="submit" name="send" value="修改">
            <input type="submit" value="重置">
            <input type="submit" name="back" value="返回"></div>
    </form>
</body>
</html>
