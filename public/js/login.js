/**
 * Created by L.H.S on 2016/10/16.
 */

// 0切换到登录；1切换到注册
function change(syb) {
    Ids = ["log", "reg"];
    var current = (syb + 1) % 2;
    $("#" + Ids[current]).hide();
    showDiv(Ids[syb]);
}

function login() {

    var fields = document.getElementById("log").getElementsByTagName("input");
    var inputs = new Array(2);
    for (var i = 0; i < fields.length; i++) {
        inputs[i] = fields[i].value;
    }

    var lbl = document.createElement("label");
    lbl.className = 'error_lbl';
    lbl.style.right = '25px';

    if (inputs[0] == '') {
        lbl.innerHTML = '请输入用户名';
        fields[0].parentNode.append(lbl);
        fields[0].onclick = function () {
            lbl.remove();
        };
    } else if (inputs[1] == '') {
        lbl.innerHTML = '请输入密码';
        fields[1].parentNode.append(lbl);
        fields[1].onclick = function () {
            lbl.remove();
        };
    } else {

        $.ajax({
            url: 'Login',
            type: 'get',
            data: {
                'username': inputs[0],
                'password': inputs[1]
            },
            success: function (result) {
                if (result == -2) {
                    lbl.innerHTML = '用户名不存在';
                    fields[0].parentNode.append(lbl);
                    fields[0].onclick = function () {
                        lbl.remove();
                    };
                } else if (result == '') {
                    lbl.innerHTML = '密码错误';
                    fields[1].parentNode.append(lbl);
                    fields[1].onclick = function () {
                        lbl.remove();
                    };
                } else {
                    window.location.href = 'HomePage/' + inputs[0] + '/' + result[0].id;
                }
            },
            error: function () {
                alert('登录失败');
            }
        });

    }
}

function Register() {

    var fields = document.getElementById("reg").getElementsByTagName("input");
    var inputs = new Array(3);
    for (var i = 0; i < fields.length; i++) {
        inputs[i] = fields[i].value;
    }

    var lbl = document.createElement("label");
    lbl.className = 'error_lbl';

    if (inputs[0] == '') {
        lbl.innerHTML = '请输入用户名';
        fields[0].parentNode.append(lbl);
        fields[0].onclick = function () {
            lbl.remove();
        };
    } else if (inputs[1] == '') {
        lbl.innerHTML = '请输入密码';
        fields[1].parentNode.append(lbl);
        fields[1].onclick = function () {
            lbl.remove();
        };
    } else {
        if (inputs[1] == [inputs[2]]) {

            $.ajax({
                url: 'CheckRepeat',
                type: 'get',
                data: {
                    'username': inputs[0]
                },
                success: function (result) {
                    if (result > 0) {
                        lbl.innerHTML = '该用户名已存在';
                        fields[0].parentNode.append(lbl);
                        fields[0].onclick = function () {
                            lbl.remove();
                        };
                    } else {
                        window.location.href = 'Register/' + inputs[0] + '/' + inputs[1];
                    }
                },
                error: function () {
                    alert('注册失败')
                }
            });

        } else {
            lbl.innerHTML = '两次密码不一致';
            fields[2].parentNode.append(lbl);
            fields[2].onclick = function () {
                lbl.remove();
            };
        }
    }
}

function showDiv(elem_id) {
    $("#" + elem_id).fadeIn("slow");
}


/** homepage **/
function showIntro(index) {

    var parent = document.getElementsByClassName("each_pic")[index];
    var intro = ["<div style='text-align:center;font-style: italic;'>&lt;赛迹&gt;<br></div>在这里您可以发起竞赛，也可以参与其他用户发起的竞赛",
        "<div style='text-align:center;font-style:italic;'>&lt;日迹&gt;<br></div>这里记录了您每天的运动数据、睡眠时间及体重变化",
        "<div style='text-align:center;font-style:italic;'>&lt;足迹&gt;<br></div>这里有您燃烧掉的卡路里、抛物线降落的体重，以及每个有我陪伴的夜晚",
        "<div style='text-align:center;font-style:italic;'>&lt;人迹&gt;<br></div>这里见证了所有人挑战自我的执着，瓜分了每个人半途而废的念想"];

    parent.style.opacity = "0.7";
    parent.style.boxShadow = "0 0 10px #cad2f7";
    var div = parent.getElementsByClassName("intro_text_over")[0];
    div.innerHTML = intro[index];
    $(div).fadeIn();
    parent.appendChild(div);
}

function hideIntro(index) {
    var parent = document.getElementsByClassName("each_pic")[index];
    var child = parent.getElementsByClassName("intro_text_over")[0];
    $(child).hide();
    parent.style.opacity = "1";
    parent.style.boxShadow = "0 0 7px #d8d8d8";
}