/**
 * Created by L.H.S on 2016/10/16.
 */

var iBase = {
    SetOpacity: function (ev, v) {
        ev.filters ? ev.style.filter = 'alpha(opacity=' + v + ')'
            : ev.style.opacity = v / 100;
    }
};

// 0切换到登录；1切换到注册
function change(syb) {
    Ids = ["log", "reg"];
    var current = (syb + 1) % 2;
    $("#" + Ids[current]).hide();
    showDiv(Ids[syb]);
}

function showDiv(elem_id) {

    var elem = document.getElementById(elem_id);
    var speed = 20;
    var opacity = 100;

    elem.style.display = "";
    iBase.SetOpacity(elem, 0);
    var val = 0;
    (function () {
        iBase.SetOpacity(elem, val);
        val += 5;
        if (val <= opacity) {
            setTimeout(arguments.callee, speed)
        }
    })();
}

function hideDiv(elem_id) {

    var elem = document.getElementById(elem_id);
    var speed = 15;
    var opacity = 0;

    var val = 100;
    (function () {
        iBase.SetOpacity(elem, val);
        val -= 5;
        if (val >= opacity) {
            setTimeout(arguments.callee, speed);
        } else if (val < 0) {
            elem.style.display = 'none';
        }
    })();
}


function login() {
    window.location.href = "/Track/resources/views/pages/HomePage.html";
}

function Register() {

}


/** homepage **/
function showIntro(index) {
    var point = document.getElementsByClassName("point")[index];
    var box = document.getElementById("bubble");
    var intro = ["这里记录了您每天的运动数据、睡眠时间及体重变化",
                 "在这里您可以发起活动，也可以参与其他用户发起的运动",
                 "这里有您燃烧掉的卡路里、抛物线降落的体重，以及每个有我陪伴的夜晚",
                 "这里见证了所有人挑战自我的执着，瓜分了每个人半途而废的念想"];

    box.getElementsByTagName("span")[0].innerHTML = intro[index];

    box.style.left = (point.offsetLeft - 120) + "px";

    if (index == 0 || index == 1) {
        box.style.top = (point.offsetTop - 95) + "px";
    } else {
        box.style.top = (point.offsetTop - 115) + "px";
    }

    showDiv("bubble");
}