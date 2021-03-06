<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Track</title>

    <link href="/Track/public/css/common.css" rel="stylesheet">
    <link href="/Track/public/css/reset.css" rel="stylesheet">
    <link href="/Track/public/css/activity.css" rel="stylesheet">
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
        <div class="nav" onclick="window.location.href='/Track/public/HomePage/<?php echo $username; ?>/<?php echo $userId; ?>'">首页
        </div>
        <div class="nav" onclick="window.location.href='/Track/public/Daily/<?php echo $username; ?>/<?php echo $userId; ?>'">日迹</div>
        <div class="nav active"
             onclick="window.location.href='/Track/public/Activity/<?php echo $username; ?>/<?php echo $userId; ?>'">赛迹
        </div>
        <div class="nav" onclick="window.location.href='/Track/public/History/<?php echo $username; ?>/<?php echo $userId; ?>'">足迹
        </div>
        <div class="nav" onclick="window.location.href='/Track/public/Social/<?php echo $username; ?>/<?php echo $userId; ?>'">人迹
        </div>
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
        <span class="person_lbl"
              onclick="window.location.href='/Track/public/Personal/<?php echo $username; ?>/<?php echo $userId; ?>'">个人中心</span>
    </div>

    <div class="menu_person" onclick="Signout()">
        <img src="/Track/public/Image/signout.svg" class="person_icon" style="top: 4px; left: 5px;">
        <span class="person_lbl">注&nbsp;销</span>
    </div>
</div>

<div class="top_bg"></div>

<div class="launch_activity" onclick="$('#modal').fadeIn(300)">
    发起竞赛
</div>

<div class="hide_launch" onclick="$('#modal').fadeIn(300)">
    <i class="fa fa-plus fa-2x"></i>
</div>

<!-- 左侧导航栏 -->
<div class="left_nav" style="top: 280px;">

    <div class="sub_nav sub-active" onclick="changeTab(0)">
        竞赛场
        <i class="fa fa-angle-right"></i>
    </div>

    <!--<div class="hide_bar sport"></div>-->

    <div class="sub_nav" onclick="changeTab(1)">
        我的竞赛
        <i class="fa fa-angle-right"></i>
    </div>

    <!--<div class="hide_bar sleep"></div>-->

</div>

<div class="right_div hide_eye" onclick="hidePic(this)">
    <i class="fa fa-eye-slash"></i>
    <span style="font-size: 14px;">隐藏</span><span style="font-size: 14px;">规则</span>
</div>

<div id="intropic" class="right_div" style="padding-top: 2px; padding-bottom: 2px; opacity: 0.85; margin-top: 2px;">
    <img src="/Track/public/Image/activity-intro.png" style="width: 100%;">
</div>

<div id="acts" class="right_div" style="margin-top: 20px;">

    <div id="act_copy" style="display: none;">

        <div class="each_act">
            <div class="act_top">
                &nbsp;
                <div style="display: inline"><span>活动名称</span></div>
                <div style="display: inline; font-size: 14px; font-weight: 200">
                    开始日期：<span>2016/10/20</span>
                </div>

                <i class="fa fa-plus plus_btn"><a>参与竞赛</a></i>

                <div class="hide_launcher" style="float: right; margin-right: 15px;">
                    <div class="launcher_img">
                        <i class="fa fa-user" style="color: #fff;"></i>
                    </div>
                    <span>发起者</span>
                </div>
            </div>

            <div class="act_content hide_info">
                参与人数<br>
                <span style="font-weight: 600; line-height: 40px;">100</span>
            </div>

            <div style="width: 120px" class="act_content hide_info">
                奖品<br>
                <span style="font-weight: 600; line-height: 40px;">大作业一份</span>
            </div>

            <div style="width: 125px" class="act_content hide_info">
                倒计时<br>
                <span style="font-weight: 600; line-height: 40px;">2天10小时33分</span>
            </div>

            <div style="width: 250px" class="act_content">
                描述<br>
                <span style="font-size: 14px; line-height: 40px;">
                js是世界上最好的语言
            </span>
            </div>

        </div>

    </div>

</div>

<div id="myact" class="right_div" style="margin-top: 20px; display: none;">

    <div class="record_div">
        <div>发起次数 <br> <span>50</span>
        </div>
        <div>参与次数 <br> <span>100</span>
        </div>
        <div>
            获胜次数 <br> <span>60</span>
        </div>
        <div>
            胜率 <br> <span>60%</span>
        </div>
        <div>
            等级 <br> <span>V3</span>
        </div>
    </div>

    <!-- 我发起的 -->
    <div style="margin-top: 40px; color: #30312f;">

        <div class="lead_text">我发起的竞赛
            <i class="fa fa-sort-down" onclick="$('#mylaunch').slideToggle('slow');"></i>
        </div>

        <div id="mylaunch" class="slide_div"></div>

    </div>

    <!-- 我参与的 -->
    <div style="margin-top: 40px; color: #30312f;">

        <div class="lead_text">我参与的竞赛
            <i class="fa fa-sort-down" onclick="$('#mypartin').slideToggle('slow');"></i>
        </div>

        <div id="mypartin" class="slide_div" style="display: none;"></div>
    </div>

</div>


<div class="bottom_nav">
    @Copyright  Sure
</div>

<div id="modal" class="modal_parent" onclick="cancelModal()">

    <div class="launch_modal">

        <div>

        <div class="launch_title">发起竞赛

            <div style="margin: 15px auto">
                <div class="field_tip">竞赛名称</div>
                <div style="display: inline-block;">
                    <input type="text" placeholder="(必填)">
                </div>
            </div>

            <div style="margin: 15px auto">
                <div class="field_tip">开始时间</div>
                <div style="display: inline-block; position: relative">
                    <input id="start_time" type="text" placeholder="(必填)">
                </div>
            </div>

            <div style="margin: 15px auto">
                <div class="field_tip">结束时间</div>
                <div style="display: inline-block; position: relative;">
                    <input id="end_time" type="text" placeholder="(必填)">
                </div>
            </div>

            <div style="margin: 15px auto">
                <div class="field_tip" style="vertical-align: top;">竞赛描述</div>
                <div style="display: inline-block; vertical-align: top;">
                    <textarea placeholder="(必填)"></textarea>
                </div>
            </div>

            <div style="margin: 15px auto">
                <div class="field_tip">竞赛奖励</div>
                <div style="display: inline-block;">
                    <input type="text" placeholder="(可不设奖励)">
                </div>
            </div>

            <div style="margin: 20px auto; margin-top: 30px;">
                <div class="publish_btn" onclick="publish()">发布</div>
                <div class="publish_btn cancel_btn" onclick="$('#modal').fadeOut()">取消</div>
            </div>

            <span>请填写完整信息</span>

            <div class="left_deco"></div>
        </div>
    </div>
</div>


<a id="storage_id" style="display: none"><?php echo $userId; ?></a>

<script src="/Track/public/js/common.js"></script>
<script src="/Track/public/js/jquery.js"></script>
<script src="/Track/public/js/activity.js"></script>
<script src="/Track/public/js/datetimepicker.js"></script>
<script>
    $('#start_time').datetimepicker({
        lang: 'ch',
        timepicker: true,
        format: 'Y/m/d H:00:00'
    });
    $('#end_time').datetimepicker({
        lang: 'ch',
        timepicker: true,
        format: 'Y/m/d H:00:00'
    });
</script>
</body>
</html>