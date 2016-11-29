/**
 * Created by L.H.S on 2016/10/18.
 */
var USERID = document.getElementById("storage_id").innerHTML.trim();

window.onload = function () {
    getSportData();
    getSleepData();
    getBodyData();
};

function getSportData() {
    $.ajax({
        url: '/Track/public/DailySport',
        type: 'get',
        data: {'userId': USERID},
        success: function (result) {
            var circles = document.getElementsByClassName("circle");
            circles[0].getElementsByTagName("span")[0].innerHTML = result.heat;
            circles[1].getElementsByTagName("span")[0].innerHTML = result.step;
            circles[2].getElementsByTagName("span")[0].innerHTML = result.distance;
        },
        error: function () {
            alert("链接失败");
        }
    });

    getBarChart('stepchart');
}

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
}

function getSleepData() {

    $.ajax({
        url: '/Track/public/DailySleep',
        type: 'get',
        data: {'userId': USERID},
        success: function (result) {
            var sleep = document.getElementsByClassName("sleep_advice")[0];
            var start = result.start_time.split(' ')[1];
            var end = result.end_time.split(' ')[1];
            sleep.getElementsByTagName('span')[0].innerHTML = start;
            sleep.getElementsByTagName('span')[1].innerHTML = end;

            var startTimeDate = new Date(Date.parse(result.start_time.replace(/-/g, "/")));
            var endTimeDate = new Date(Date.parse(result.end_time.replace(/-/g, "/")));
            var s1 = startTimeDate.getTime(), s2 = endTimeDate.getTime();
            var total = (s2 - s1) / 1000;
            var day = parseInt(total / (24 * 60 * 60));//计算整数天数
            var afterDay = total - day * 24 * 60 * 60;//取得算出天数后剩余的秒数
            var hour = parseInt(afterDay / (60 * 60));//计算整数小时数
            var afterHour = total - day * 24 * 60 * 60 - hour * 60 * 60;//取得算出小时数后剩余的秒数
            var min = parseInt(afterHour / 60);//计算整数分
            var sleepLength = hour + min / 60.0;

            var health = getDashbord("sleep", "dashboard", sleepLength.toFixed(2));

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
        },
        error: function () {
            alert("链接失败");
        }
    });
}

function getBodyData() {
    $.ajax({
        url: '/Track/public/DailyBody',
        type: 'get',
        data: {'userId': USERID},
        success: function (result) {
            var body = document.getElementsByClassName("sleep_advice")[1];
            body.getElementsByTagName('span')[0].innerHTML = result.weight;
            body.getElementsByTagName('span')[1].innerHTML = result.height;

            var health = getDashbord("body", "dashboard_bodywei", result.weight);

            getBarChart("bodyweibar");
        },
        error: function () {
            alert("链接失败");
        }
    });
}