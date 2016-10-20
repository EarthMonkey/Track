/**
 * Created by L.H.S on 2016/10/19.
 */

window.onload = function () {
    getHobbies();
};

// 更新个人信息
function updateInfo() {

    var bar = document.getElementsByClassName("left_nav_person")[0];
    var inputs = bar.getElementsByTagName("input");
    var is = bar.getElementsByTagName("i");

    if (is[0].style.display == "" || is[0].style.display == "none") {

        var old = new Array();

        for (var i = 0; i < inputs.length; i++) {
            if (i == inputs.length - 1) {
                inputs[i].disabled = false;
            } else {
                inputs[i].readOnly = false;
            }
            inputs[i].style.backgroundColor = "#fff";
            inputs[i].style.boxShadow = "0 0 5px #A7CF64";
            old[i] = inputs[i].value;
        }

        $(is[0]).fadeIn();
        $(is[1]).fadeIn();

        is[0].onclick = function () {
            for (var i = 0; i < inputs.length; i++) {
                if (i == inputs.length - 1) {
                    inputs[i].disabled = true;
                } else {
                    inputs[i].readOnly = true;
                }
                inputs[i].style.backgroundColor = "transparent";
                inputs[i].style.boxShadow = "none";
            }

            $(is[0]).hide();
            $(is[1]).hide();
        };

        is[1].onclick = function () {
            for (var i = 0; i < inputs.length; i++) {
                inputs[i].value = old[i];
                if (i == inputs.length - 1) {
                    inputs[i].disabled = true;
                } else {
                    inputs[i].readOnly = true;
                }
                inputs[i].style.backgroundColor = "transparent";
                inputs[i].style.boxShadow = "none";
            }

            $(is[0]).hide();
            $(is[1]).hide();
        };
    }
}

function getHobbies() {
    var parent = document.getElementById("hobbies");
    var copy = document.getElementById("hobby_copy");

    var hob = ["桌球", "羽毛球", "篮球", "健身", "跑步", "电影", "网球", "音乐", "吃吃吃", "码代码"];

    for (var i = 0; i < 10; i++) {
        var div = document.createElement("div");
        div.innerHTML = copy.innerHTML;
        div.style.display = "inline-block";
        div.getElementsByClassName("hobby_lbl")[0].getElementsByTagName("div")[0].innerHTML = hob[i];

        parent.appendChild(div);
    }

}

// 修改兴趣
function hobbyMod() {

    var parent = document.getElementById("hobbies");
    var lbls = parent.getElementsByTagName("i");
    for (var i = 0; i < lbls.length; i++) {
        $(lbls[i]).show();

        lbls[i].onclick = function () {
            var node = this.parentNode.parentNode;
            parent.removeChild(node);
        }
    }

    var complete = document.getElementById("complete");
    $(complete).fadeIn();
    complete.onclick = function () {
        Complete();
    }
}

// 增加兴趣
function hobbyAdd() {

    var parent = document.getElementById("addhob");
    var copy = document.getElementById("hobadd_copy");
    var complete = document.getElementById("complete");

    var num = parent.getElementsByTagName("i").length;
    if (num > 1) {
        $(complete).fadeIn();
        $("#addhob").slideDown();
        return;
    }

    var hob = ["瑜伽", "竞走", "马拉松", "攀岩", "游泳", "足球", "乒乓球", "网球", "柔道", "自行车"];

    for (var i = 0; i < 10; i++) {
        var div = document.createElement("div");
        div.innerHTML = copy.innerHTML;
        div.style.display = "inline-block";
        div.getElementsByClassName("hobby_lbl")[0].getElementsByTagName("div")[0].innerHTML = hob[i];

        var addbtn = div.getElementsByTagName("i")[0];
        addbtn.onclick = function () {

            var div = document.createElement("div");
            div.innerHTML = document.getElementById("hobby_copy").innerHTML;
            div.style.display = "inline-block";
            div.getElementsByClassName("hobby_lbl")[0].getElementsByTagName("div")[0].innerHTML
                = this.parentNode.parentNode.getElementsByTagName("div")[0].innerHTML;

            document.getElementById("hobbies").appendChild(div);

        };

        parent.appendChild(div);
    }

    $("#addhob").slideDown();

    $(complete).fadeIn();
    complete.onclick = function () {
        Complete();
    }
}

// 0,完成修改；1,完成增加
function Complete() {

    var lbls = document.getElementById("hobbies").getElementsByTagName("i");
    for (var i = 0; i < lbls.length; i++) {
        $(lbls[i]).hide();
    }

    $("#addhob").slideUp();

    $("#complete").hide();
}

function hideVip() {
    $("#vip_ad").hide(700);
    $("#vip").show(700);
}

function showVip() {
    if (document.body.scrollTop > 128) {
        $('html,body').animate({scrollTop: '0px'}, 100);
    }
    $("#vip").hide(700);
    $("#vip_ad").show(700);
}