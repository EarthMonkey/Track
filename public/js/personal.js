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
    var lbls = document.getElementById("hobbies").getElementsByTagName("i");
    for (var i = 0; i < lbls.length; i++) {
        $(lbls[i]).show();

        lbls[i].onclick = function () {
            var node = this.parentNode.parentNode;
            parent.removeChild(node);
        }
    }
}