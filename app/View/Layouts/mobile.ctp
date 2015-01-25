<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>沪江在线</title>
    <?php
    echo $this->Html->meta('icon');

    echo $this->Html->css('mobile');

    ?>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" name="viewport">
    <script src="/js/jquery-1.11.0.min.js"></script>
    <script src="/js/swipe.js"></script>
</head>
<body>
<?php echo $this->fetch('content'); ?>
<div class="menuBox">
    <ul class="num">
        <li class="now"></li>
        <li></li>
    </ul>
    <div class="menuBoxList">
        <ul class="swipe-wrap">
            <li>
                <a href="/Mobile/Users/login" class="menub1">登录</a>
                <a href="/Mobile/Users/register" class="menub2">注册</a>
                <a href="/Mobile/Courses/courselist" class="menub3">课表</a>
                <a href="../product/project_list.html" class="menub4">--</a>
            </li>
            <li>
                <a href="##" class="menub5">--</a>
                <a href="##" class="menub6">--</a>
                <a href="##" class="menub7">--</a>
                <a href="##" class="menub8">--</a>
            </li>
        </ul>
    </div>
</div>

</body>
</html>