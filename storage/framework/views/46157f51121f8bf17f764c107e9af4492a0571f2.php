<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Track</title>

    <link href="/Track/public/css/common.css" rel="stylesheet">
    <link href="/Track/public/css/reset.css" rel="stylesheet">
    <link href="/Track/public/css/social.css" rel="stylesheet">
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
        <div class="nav active" onclick="window.location.href='/Track/public/Social/<?php echo $username; ?>/<?php echo $userId; ?>'">人迹</div>
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
        <span class="person_lbl" onclick="window.location.href='/Track/public/Personal/<?php echo $username; ?>/<?php echo $userId; ?>'">个人中心</span>
    </div>

    <div class="menu_person" onclick="Signout()">
        <img src="/Track/public/Image/signout.svg" class="person_icon" style="top: 4px; left: 5px;">
        <span class="person_lbl">注&nbsp;销</span>
    </div>
</div>

<div class="top_bg"></div>

<!-- 左侧导航栏 -->
<div class="left_nav">

    <div class="sub_nav sub-active" onclick="changeTab(0)">
        好友动态
        <i class="fa fa-angle-right"></i>
    </div>

    <!--<div class="hide_bar sport"></div>-->

    <div class="sub_nav" onclick="changeTab(1)">
        我的关注
        <i class="fa fa-angle-right"></i>
    </div>

    <!--<div class="hide_bar sleep"></div>-->

    <div class="sub_nav" onclick="changeTab(2)">
        我的粉丝
        <i class="fa fa-angle-right"></i>
    </div>

</div>


<div id="mydynamic" class="right_div">

    <div id="dynamics" style="width: 80%; margin: 20px auto;">
        <div id="dynamic_copy" style="display: none;">
            <div>
                <div class="dy_user"></div>
                <div class="dy_user_div">
                    <span class="userId_div">用户名</span><br>
                    <span>10-18 来自iPhone7</span>
                </div>
            </div>

            <div class="dy_content">
                #Track#告诉我，我从2016年10月16日 14:40 到 10月17日 10:10, 走了 3067 步，5.8 公里，燃烧 290 大卡。
            </div>

            <div style="margin-bottom: 40px;">
                <div class="dy_zan">
                    <i class="fa fa-comment-o"></i>
                    评论
                </div>
                <div class="dy_zan">
                    <i class="fa fa-thumbs-o-up"></i>
                    赞(<span>10</span>)
                </div>
            </div>
        </div>
    </div>

</div>

<div id="myconcern" class="right_div" style="display: none;">


    <div id="fan_info_copy" class="each_fan" style="display: none;">
        <div class="p_img"></div>
        <div class="p_username">
            <input class="p_text" type="text" value="用户名" readonly="true">
        </div>

        <div class="detail_hide">
            <div class="title_lbl">地区</div>
            <div class="p_username">
                <input class="p_text" style="font-size: 14px;" type="text" value="江苏省 南京市 鼓楼区" readonly>
            </div>
        </div>

        <div class="detail_hide">
            <div class="title_lbl">个人主页</div>
            <div class="p_username">
                <input class="p_text" style="font-size: 14px;" type="text" value="xxx.xxxxx.xxx" readonly>
            </div>
        </div>


        <div class="detail_hide"v>
            <div class="title_lbl">邮箱</div>
            <div class="p_username">
                <input class="p_text" style="font-size: 14px;" type="text" value="794637366@qq.com" readonly>
            </div>
        </div>

        <div class="detail_hide">
            <div class="title_lbl">生日</div>
            <div class="p_username">
                <input id="birth" class="p_text" style="font-size: 14px;" type="text" value="1996-12-15" readonly
                       disabled>
            </div>
        </div>

        <div class="title_lbl">最新动态</div>
        <div class="newest_div">
            #Track#告诉我，我从2016年10月16日 14:40 到 10月17日 10:10, 走了 3067 步，5.8 公里，燃烧 290 大卡。"
        </div>
    </div>


</div>

<div id="myfans" class="right_div" style="display: none;">

</div>


<div class="bottom_nav">
    @Copyright  Sure
</div>

<script src="/Track/public/js/common.js"></script>
<script src="/Track/public/js/jquery.js"></script>
<script src="/Track/public/js/social.js"></script>
</body>
</html>