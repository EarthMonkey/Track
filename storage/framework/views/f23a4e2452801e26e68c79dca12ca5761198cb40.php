<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Track</title>

    <link href="/Track/public/css/common.css" rel="stylesheet">
    <link href="/Track/public/css/reset.css" rel="stylesheet">
    <link href="/Track/public/css/history.css" rel="stylesheet">
    <link href="http://cdn.bootcss.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
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
        <div class="nav" onclick="window.location.href='/Track/public/HomePage/<?php echo $username; ?>/<?php echo $userId; ?>'">首页</div>
        <div class="nav" onclick="window.location.href='/Track/public/Daily/<?php echo $username; ?>/<?php echo $userId; ?>'">日迹</div>
        <div class="nav" onclick="window.location.href='/Track/public/Activity/<?php echo $username; ?>/<?php echo $userId; ?>'">赛迹</div>
        <div class="nav active" onclick="window.location.href='/Track/public/History/<?php echo $username; ?>/<?php echo $userId; ?>'">足迹</div>
        <div class="nav" onclick="window.location.href='/Track/public/Social/<?php echo $username; ?>/<?php echo $userId; ?>'">人迹</div>
    </div>

    <div class="personal_div">

        <div class="photo"></div>
        <div class="userId"><?php echo $username; ?></div>
        <div class="fa fa-sort-desc combox" onclick="showPersonal()"></div>
    </div>

    <div class="nav_btn">
        <i class="fa fa-bars fa-2x"></i>
    </div>

</div>

<div id="personalbar" class="personal_bar" style="display: none">
    <div class="menu_person">
        <img src="/Track/public/Image/person.svg" class="person_icon">
        <span class="person_lbl" onclick="window.location.href='Personal'">个人中心</span>
    </div>

    <div class="menu_person" onclick="Signout()">
        <img src="/Track/public/Image/signout.svg" class="person_icon">
        <span class="person_lbl">注&nbsp;销</span>
    </div>
</div>

<div class="top_bg"></div>

<div class="right_div" style="margin: 20px auto; width: 90%;">

    <div class="lead_text">这些都是您留下来的痕迹</div>
    <div class="sum_pic_div">
        <img src="/Track/public/Image/his-km.png" style="z-index: 100;">
        <div style="position: absolute; left: 50px; top: 46px;">0</div>

        <img src="/Track/public/Image/his-day.png" class="mid_img" style="z-index: 100;">
        <div style="" class="hide_img_2">0</div>

        <img src="/Track/public/Image/his-cal.png" style="z-index: 100;">
        <div style="" class="hide_img_3">0</div>
    </div>

    <div class="gradual_bg"></div>

    <div class="lead_text" style="margin-top: 40px;">这是您每个或激情或安静的一天</div>
    <div id="eachday" class="chart_weight"></div>

    <div class="lead_text" style="margin-top: 40px;">这是您这些年来的体重变化</div>
    <div class="chart_weight"></div>

    <div class="lead_text" style="margin-top: 40px;">还有您每个有我陪伴的夜晚</div>
    <div class="chart_weight"></div>

</div>


<div class="bottom_nav">
    @Copyright  Sure
</div>

<script src="/Track/public/js/common.js"></script>
<script src="/Track/public/js/jquery.js"></script>
<script src="/Track/public/js/history.js"></script>
<script src="/Track/public/js/echarts.min.js"></script>
<script src="/Track/public/js/barchart.js"></script>
</body>
</html>