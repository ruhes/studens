<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/21
 * Time: 14:19
 */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>$Title$</title>
</head>
<body>
    <h2>学生信息管理系统</h2>
    <div>
        <a href="index.php?index=look&page=1">浏览学生</a>
        <a href="index.php?index=add">增加学生</a>
    </div>
    <form method="get" action="index.php">
        <p>搜索：<input type="text" name="keyWorld">
            <input type="submit" name="send" value="搜索"></p>
    </form>
    <hr/>
</body>
</html>