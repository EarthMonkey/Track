<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Track</title>

    <link href="/Track/public/css/reset.css" rel="stylesheet">
    <link href="/Track/public/css/login.css" rel="stylesheet">
</head>
<body>

<div style="width: 1280px">
    <img src="/Track/public/Image/login-bg.jpg" style="width: 100%; padding-bottom: 0;">
</div>

<div class="logo_div">
    <img src="/Track/public/Image/logo-green.png" class="logo-green">
</div>

<div class="logo_name">行迹</div>

<hr class="hr_style">

<!-- 登录 -->
<div id="log" class="login_div">

    <div>
        <div class="username">用户名：</div>
        <input type="text" class="username_field">
    </div>

    <div style="margin-top: 25px">
        <div class="username">密&nbsp;&nbsp;&nbsp;码：</div>
        <input type="password" class="username_field">
    </div>

    <div class="login_btn" onclick="login()">登录</div>

    <div class="login_tip" onclick="change(1)">没有账号？立即注册</div>
</div>

<!-- 注册 -->
<div id="reg" class="login_div" style="display: none">

    <div>
        <div class="username">&nbsp;用户名：</div>
        <input type="text" class="username_field">
    </div>

    <div style="margin-top: 25px">
        <div class="username">&nbsp;密&nbsp;&nbsp;&nbsp;码：</div>
        <input type="password" class="username_field">
    </div>

    <div style="margin-top: 25px;">
        <div class="username" style="font-size: 22px;">确认密码：</div>
        <input type="password" class="username_field">
    </div>

    <div class="login_btn" style="width: 350px" onclick="Register()">注册</div>

    <div class="login_tip" onclick="change(0)">已有账号？立即登录</div>
</div>


<script src="/Track/public/js/login.js"></script>
<script src="/Track/public/js/jquery.js"></script>
</body>
</html>