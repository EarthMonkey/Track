<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Track</title>

    <link href="/Track/public/css/common.css" rel="stylesheet">
    <link href="/Track/public/css/reset.css" rel="stylesheet">
    <link href="/Track/public/css/personal.css" rel="stylesheet">
    <link href="/Track/public/css/datetimepicker.min.css" rel="stylesheet">
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
        <div class="nav" onclick="window.location.href='/Track/public/History/<?php echo $username; ?>/<?php echo $userId; ?>'">足迹</div>
        <div class="nav" onclick="window.location.href='/Track/public/Social/<?php echo $username; ?>/<?php echo $userId; ?>'">人迹</div>
    </div>

    <div class="personal_div" style="background-color: transparent; width: auto; display: inline">
        <div class="menu_person" style="background-color: transparent;" onclick="Signout()">
            <img src="/Track/public/Image/signout.svg" class="person_icon" style="top: 4px; left: 5px;">
            <span class="person_lbl">注&nbsp;销&nbsp;&nbsp;</span>
        </div>
    </div>

    <div class="nav_btn">
        <i class="fa fa-bars fa-2x"></i>
    </div>

</div>

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

<div class="top_bg"></div>

<!-- 左侧个人信息 -->
<div id="leftinfo" class="left_nav_person">

    <div class="p_img"></div>
    <div class="p_username">
        <input class="p_text" type="text" value="" placeholder="(未填写)" readonly="true">
    </div>

    <div class="title_lbl">地区</div>
    <div class="p_username">
        <input class="p_text" style="font-size: 14px;" type="text" value="" placeholder="(未填写)" readonly>
    </div>

    <div class="title_lbl">个人主页</div>
    <div class="p_username">
        <input class="p_text" style="font-size: 14px;" type="text" value="" placeholder="(未填写)" readonly>
    </div>

    <div class="title_lbl">邮箱</div>
    <div class="p_username">
        <input class="p_text" style="font-size: 14px;" type="text" value="" placeholder="(未填写)" readonly>
    </div>

    <div class="title_lbl">生日</div>
    <div class="p_username">
        <input id="birth" class="p_text" style="font-size: 14px;" type="text" value="" placeholder="(未填写)" readonly disabled>
    </div>


    <div class="update_btn" onclick="updateInfo()">更新资料</div>
    <div class="p_username" style="margin-top: -10px;">
        <i class="fa fa-check"></i>
        <i class="fa fa-close"></i>
    </div>

</div>

<div id="vip" class="vip_btn_left vip_btn" onclick="showVip()">立即升级VIP</div>

<div id="vip_ad" class="right_div_person" style="padding-top: 2px; padding-bottom: 2px; position: relative;">

    <div class="hide_eye" onclick="hideVip()">
        <i class="fa fa-eye-slash"></i><br>
        <span style="font-size: 14px;position: relative; top: -15px;">隐藏</span>
    </div>

    <div>
        <img src="/Track/public/Image/vip-intro.png" style="width: 100%;">
    </div>

    <div class="vip_btn">立即升级VIP</div>
</div>

<div class="right_div_person" style="margin-bottom: -15px;">

    <div class="fans_div" style="margin-left: 70px; transform: rotate(4deg);">

        <div style="width: 30px; position: absolute; left: 5px;">
            <img src="/Track/public/Image/nail.png" style="width: 100%">
        </div>

        <div class="fans_title">我的目标</div>

    </div>

    <div class="fans_div" style="transform: rotate(-3deg);">

        <div style="width: 30px; position: absolute; right: 5px;">
            <img src="/Track/public/Image/nail.png" style="width: 100%">
        </div>

        <div class="fans_title">近期计划</div>

    </div>

</div>


<div class="right_div_person" style="padding-bottom: 15px;">

    <div class="lead_text_p">
        我的兴趣爱好 &nbsp;&nbsp;
        <i class="fa fa-pencil" onclick="hobbyMod()"></i> &nbsp;
        <i class="fa fa-plus" onclick="hobbyAdd()"></i> &nbsp;
        <i id="complete" style="display: none;" class="fa fa-check"></i>
    </div>

    <div id="hobbies">

        <div id="hobby_copy" style="display: none;">
            <div class="hobby_lbl">
                <div>桌球</div>
                <i class="fa fa-close"></i>
            </div>
        </div>
    </div>

</div>

<div id="addhob" class="right_div_person down_div" style="padding-bottom: 15px; padding-top: 35px;">

    <div id="hobadd_copy" style="display: none;">
        <div class="hobby_lbl">
            <div>瑜伽</div>
            <div style="float: right;">
                <i class="fa fa-plus" style="display: block;"></i>
            </div>
        </div>
    </div>

</div>


<div class="bottom_nav">
    @Copyright  Sure
</div>

<a id="storage_id" style="display: none"><?php echo $userId; ?></a>

<script src="/Track/public/js/common.js"></script>
<script src="/Track/public/js/jquery.js"></script>
<script src="/Track/public/js/personal.js"></script>
<script src="/Track/public/js/datetimepicker.js"></script>
<script>
    $('#birth').datetimepicker({
        lang: 'ch',
        timepicker: false,
        format: 'Y-m-d'
    });
</script>
</body>
</html>