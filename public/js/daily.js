/**
 * Created by L.H.S on 2016/10/18.
 */

window.onload = function () {
    getSleepData();
    getBodyData();
};

function changeTab(index) {

    var Ids = ["mysport", "mysleep", "mybody"];

    $("#" + Ids[(index + 1) % 3]).hide(600);
    $("#" + Ids[(index + 2) % 3]).hide(600);

    if (document.getElementById(Ids[index]).style.display == "none") {
        $("#" + Ids[index]).show(500);
    }

    var subs = document.getElementsByClassName("sub_nav");
    subs[(index + 1) % 3].className = "sub_nav";
    subs[(index + 2) % 3].className = "sub_nav";
    subs[index].className = "sub_nav sub-active";

    getSleepData();
}

function getSleepData() {
    var health = getDashbord("sleep", "dashboard", 8);

    var colors = ["#1184A4", "#26B6DF", "#85A944", "#E76B25", "#CD652A"];
    var level = ["太少", "偏少", "正常", "偏多", "太多"];
    var comment = ["您昨夜睡得太少了, 急需多休息啊",
                   "您昨夜睡眠时间偏少, 记得早睡早起哦",
                   "您的睡眠习惯很健康, 请继续保持",
                   "您昨夜睡眠时间偏多, 记得早睡早起哦",
                   "您昨夜睡得太多了, 不要贪图美梦哦"];

    var leveldiv = document.getElementsByClassName("sleep_level")[0];
    leveldiv.innerHTML = level[health];
    leveldiv.style.backgroundColor = colors[health];

    var commentdiv = document.getElementsByClassName("sleep_comment")[0];
    commentdiv.innerHTML = comment[health];
    commentdiv.style.color = colors[health];

    getBarChart("sleepbar");
}

function getBodyData() {

    var health = getDashbord("body", "dashboard_bodywei", 65);

    getBarChart("bodyweibar");
}