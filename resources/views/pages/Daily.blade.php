<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Track</title>

    <link href="/Track/public/css/common.css" rel="stylesheet">
    <link href="/Track/public/css/reset.css" rel="stylesheet">
    <link href="/Track/public/css/daily.css" rel="stylesheet">
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
        <div class="nav" onclick="window.location.href='/Track/public/HomePage/{!! $username !!}/{!! $userId !!}'">首页</div>
        <div class="nav active" onclick="window.location.href='/Track/public/Daily/{!! $username !!}/{!! $userId !!}'">日迹</div>
        <div class="nav" onclick="window.location.href='/Track/public/Activity/{!! $username !!}/{!! $userId !!}'">赛迹</div>
        <div class="nav" onclick="window.location.href='/Track/public/History/{!! $username !!}/{!! $userId !!}'">足迹</div>
        <div class="nav" onclick="window.location.href='/Track/public/Social/{!! $username !!}/{!! $userId !!}'">人迹</div>
    </div>

    <div class="personal_div">

        <div class="photo"></div>
        <div class="userId">{{$username}}</div>
        <div class="fa fa-sort-desc combox" onclick="showPersonal()"></div>
    </div>

    <div class="nav_btn">
        <i class="fa fa-bars fa-2x"></i>
    </div>

</div>

<div id="personalbar" class="personal_bar" style="display: none">
    <div class="menu_person">
        <img src="/Track/public/Image/person.svg" class="person_icon">
        <span class="person_lbl" onclick="window.location.href='/Track/public/Personal/{!! $username !!}/{!! $userId !!}'">个人中心</span>
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
        我的运动
        <i class="fa fa-angle-right"></i>
    </div>

    <div class="sub_nav" onclick="changeTab(1)">
        睡眠分析
        <i class="fa fa-angle-right"></i>
    </div>

    <div class="sub_nav" onclick="changeTab(2)">
        身体管理
        <i class="fa fa-angle-right"></i>
    </div>

    <div class="hide_bar sport" onclick="changeTab(0)"></div>

    <div class="hide_bar sleep" onclick="changeTab(1)"></div>

    <div class="hide_bar hide_body" onclick="changeTab(2)">
        <i class="fa fa-plus-square fa-2x "></i>
    </div>

</div>


<div id="mysport" class="right_div">

    <div class="lead_text">您今天的运动状况</div>
    <div style="margin-left: 80px;">
        <div class="circle">
            <div style="margin-top: 45px;">
                已燃烧大卡<br>
                <span style="font-size: 26px;">0</span>
                <span style="font-size: 16px">大卡</span>
            </div>
        </div>

        <div class="circle circle_blue">
            <div style="margin-top: 45px;">
                累计步数<br>
                <span style="font-size: 26px;">0</span>
                <span style="font-size: 16px">步</span>
            </div>
        </div>

        <div class="circle circle_orange">
            <div style="margin-top: 45px;">
                运动距离<br>
                <span style="font-size: 26px;">0</span>
                <span style="font-size: 16px">公里</span>
            </div>
        </div>
    </div>

    <div class="lead_text" style="margin-top: 50px;">这些运动量可以</div>
    <div style="margin-left: 80px;">

        <div class="rectangle" style="background-color: #d5ebcc;">

            <img src="/Track/public/Image/pic_run.png" style="left: 45px;" class="pic_img">
            <div class="pic_text">
                绕环形跑道<br>
                <span style="font-size: 26px">15</span>
                <span style="font-size: 16px;">圈</span>
            </div>

        </div>

        <div class="rectangle">

            <img src="/Track/public/Image/pic_meat.png" class="pic_img">
            <div class="pic_text">
                消耗肥肉<br>
                <span style="font-size: 26px">1.5</span>
                <span style="font-size: 16px;">公斤</span>
            </div>

        </div>

        <div class="rectangle" style="background-color: #d5ebcc;">

            <img src="/Track/public/Image/pic_fuel.png" class="pic_img">
            <div class="pic_text">
                省下93#汽油<br>
                <span style="font-size: 26px">2.0</span>
                <span style="font-size: 16px;">升</span>
            </div>

        </div>

        <div class="rectangle">

            <img src="/Track/public/Image/pic_light.png" class="pic_img">
            <div class="pic_text">
                60W灯泡亮<br>
                <span style="font-size: 26px">10</span>
                <span style="font-size: 16px;">小时</span>
            </div>

        </div>
    </div>

    <div class="lead_text hide_text" style="margin-top: 50px;">您的运动曲线图</div>
    <div id="stepchart" class="chart_div"></div>

</div>

<div id="mysleep" class="right_div" style="display: none;">

    <div>
        <div id="dashboard" class="dashboard_div"></div>
        <div class="chart_sum_div">
            <div style="width: 30px; position: absolute; left: 5px;">
                <img src="/Track/public/Image/nail.png" style="width: 100%">
            </div>

            <div class="sleep_title">昨夜睡眠情况</div>

            <div class="sleep_advice">
                <div>
                    <i class="fa fa-bed"></i>&nbsp;入睡时间&nbsp; <span>00 : 00</span>
                </div>
                <div style="margin-top: 10px;">
                    <i class="fa fa-child"></i>&nbsp;起床时间&nbsp; <span>10 : 30</span>
                </div>

                <div style="margin-top: 50px;">
                    <div class="sleep_level">
                        健康
                    </div>

                    <div class="sleep_comment">
                        您的睡眠习惯很健康,请继续保持
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="margin-top: 40px;">
        <div class="lead_text">近期睡眠时间总览</div>
        <div id="sleepbar" class="chart_weight chart_width"></div>
    </div>

</div>

<div id="mybody" class="right_div" style="display: none;">

    <div>
        <div id="dashboard_bodywei" class="dashboard_div"></div>
        <div class="chart_sum_div">
            <div style="width: 30px; position: absolute; left: 5px;">
                <img src="/Track/public/Image/nail.png" style="width: 100%">
            </div>

            <div class="sleep_title">身高体重记录</div>

            <div class="sleep_advice">
                <div>
                    <img src="/Track/public/Image/weight.png">&nbsp;体重&nbsp; <span>65</span>&nbsp;kg
                </div>
                <div style="margin-top: 10px;">
                    <img src="/Track/public/Image/height.png">&nbsp;身高&nbsp; <span>180</span>&nbsp;cm
                </div>

                <div style="margin-top: 30px;">
                    <div class="sleep_level" style="font-size: 22px; line-height: inherit;">
                        <div style="margin-top: 10px; margin-bottom: -5px;">健康</div>
                        <span style="font-size: 16px;">BMI 20.1</span>
                    </div>

                    <div style="margin: 10px auto;">
                        <img src="/Track/public/Image/BMI.png" style="width: 250px; height: 60px;">
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div style="margin-top: 40px;">
        <div class="lead_text">近期体重变化总览</div>
        <div id="bodyweibar" class="chart_weight chart_width"></div>
    </div>

</div>

<div class="bottom_nav">
    @Copyright Sure
</div>

<a id="storage_id" style="display: none">{!! $userId !!}</a>

<script src="/Track/public/js/common.js"></script>
<script src="/Track/public/js/jquery.js"></script>
<script src="/Track/public/js/daily.js"></script>
<script src="/Track/public/js/echarts.min.js"></script>
<script src="/Track/public/js/dashboardchart.js"></script>
<script src="/Track/public/js/barchart.js"></script>
</body>
</html>