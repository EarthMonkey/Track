<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Track</title>

    <link href="http://cdn.bootcss.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="/Track/public/css/reset.css" rel="stylesheet">
    <link href="/Track/public/css/common.css" rel="stylesheet">
    <link href="/Track/public/css/homepage.css" rel="stylesheet">
</head>
<body>

<!-- 导航栏 -->
<div class="nav_bar">

    <img src="/Track/public/Image/logo-white.png" class="logo_white">
    <div class="logo_text">
        行迹<br>
        Track
    </div>

    <div class="navs">
        <div class="nav active" onclick="window.location.href='/Track/public/HomePage/<?php echo $username; ?>/<?php echo $userId; ?>'">首页</div>
        <div class="nav" onclick="window.location.href='/Track/public/Daily/<?php echo $username; ?>/<?php echo $userId; ?>'">日迹</div>
        <div class="nav" onclick="window.location.href='/Track/public/Activity/<?php echo $username; ?>/<?php echo $userId; ?>'">赛迹</div>
        <div class="nav" onclick="window.location.href='/Track/public/History/<?php echo $username; ?>/<?php echo $userId; ?>'">足迹</div>
        <div class="nav" onclick="window.location.href='/Track/public/Social/<?php echo $username; ?>/<?php echo $userId; ?>'">人迹</div>
    </div>

    <div class="personal_div">

        <div class="photo"></div>
        <div class="userId"><?php echo $username; ?></div>
        <div class="fa fa-sort-desc combox" onclick="showPersonal()"></div>
    </div>

    <!-- 响应式菜单 -->
    <div class="nav_btn">
        <i class="fa fa-bars fa-2x"></i>
    </div>

</div>

<!-- 下拉菜单 -->
<div id="personalbar" class="personal_bar" style="display: none">
    <div class="menu_person">
        <img src="/Track/public/Image/person.svg" class="person_icon">
        <span class="person_lbl" onclick="window.location.href='/Track/public/Personal/<?php echo $username; ?>/<?php echo $userId; ?>'">个人中心</span>
    </div>

    <div class="menu_person" onclick="Signout()">
        <img src="/Track/public/Image/signout.svg" class="person_icon" style="top: 4px; left: 5px;">
        <span class="person_lbl">注&nbsp;销</span>
    </div>
</div>

<div class="intro_div">
    <img src="/Track/public/Image/footprint-left.jpg" class="foot_left">
    <img src="/Track/public/Image/footprint-right.jpg" class="foot_left" style="float: right;">
    <div style="position: relative;top: 55px; font-family: 'Libian SC', 'PingFang SC', serif;">
        行迹<br>
        让您的每一步都有迹可寻
    </div>
</div>

<div class="sum_div">

    <div class="each_pic activity_pic" onmouseenter="showIntro(0)" onmouseleave="hideIntro(0)">
        <div class="intro_text_over" style="display: none"></div>
    </div>

    <div style="margin-top: 60px;">

        <div class="each_pic daily_pic" onmouseenter="showIntro(1)" onmouseleave="hideIntro(1)">
            <div class="intro_text_over" style="display: none"></div>
        </div>

        <div class="cross_div">

            <div style="position: absolute; top: 110px;"
                 onmouseenter="showIntro(1)" onmouseleave="hideIntro(1)">
                <i class="fa fa-angle-left"></i>日迹
            </div>

            <div style="position: absolute; left: 60px;"
                 onmouseenter="showIntro(0)" onmouseleave="hideIntro(0)">
                <i class="fa fa-angle-up"></i>赛迹
            </div>

            <div style="position: absolute; right: 5px; top: 110px;"
                 onmouseenter="showIntro(2)" onmouseleave="hideIntro(2)">
                足迹&nbsp;<i class="fa fa-angle-right"></i>
            </div>

            <div style="position: absolute; bottom: 0px; right: 100px;"
                 onmouseenter="showIntro(3)" onmouseleave="hideIntro(3)">
                人迹&nbsp;<i class="fa fa-angle-down"></i>
            </div>

        </div>

        <div class="each_pic history_pic" onmouseenter="showIntro(2)" onmouseleave="hideIntro(2)">
            <div class="intro_text_over" style="display: none"></div>
        </div>

    </div>

    <div class="each_pic social_pic" onmouseenter="showIntro(3)" onmouseleave="hideIntro(3)">
        <div class="intro_text_over" style="display: none"></div>
    </div>
</div>


<div class="bottom_nav">
    @Copyright  Sure
</div>

<script src="/Track/public/js/login.js"></script>
<script src="/Track/public/js/common.js"></script>
<script src="/Track/public/js/jquery.js"></script>
</body>
</html>