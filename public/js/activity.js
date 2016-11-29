/**
 * Created by L.H.S on 2016/10/18.
 */
var USERID = document.getElementById('storage_id').innerHTML.trim();

window.onload = function () {
    getAllActs();
    getMyLaunch();
    getMyPartin();
};

function getAllActs() {

    var parent = document.getElementById("acts");
    var copy = document.getElementById("act_copy");

    $.ajax({
        url: '/Track/public/GetAllActivities',
        type: 'post',
        success: function (result) {
            if (result.length > 0) {
                for (var i = 0; i < result.length; i++) {
                    var div = document.createElement("div");
                    div.innerHTML = copy.innerHTML;

                    var partin = div.getElementsByClassName('plus_btn')[0];
                    partin.onclick = function () {
                        partIn(this);
                    };

                    var spans = div.getElementsByTagName("span");
                    spans[0].innerHTML = result[i].activity_name;
                    spans[1].innerHTML = (result[i].start_time.split(" "))[0];

                    var a1 = document.createElement('a');
                    a1.style.display = 'none';
                    a1.innerHTML = result[i].id;
                    div.getElementsByClassName("act_top")[0].appendChild(a1);
                    var a2 = document.createElement('a');
                    a2.style.display = 'none';
                    a2.innerHTML = result[i].launcher_id;
                    div.getElementsByClassName("act_top")[0].appendChild(a2);

                    $.ajax({
                        url: '/Track/public/GetUsername',
                        type: 'get',
                        async: false,
                        data: {'userId': result[i].launcher_id},
                        success: function (result) {
                            spans[2].innerHTML = result[0].username;
                        },
                        error: function () {
                            alert("获取用户名失败");
                        }
                    });

                    spans[3].innerHTML = 0;  // 参与人数

                    spans[4].innerHTML = result[i].award;

                    // 倒计时
                    var now = new Date();
                    var begin_time = result[i].start_time;
                    var start = Date.parse(begin_time);
                    var minus_time = start - now.getTime();

                    var days = Math.floor(minus_time / (24 * 3600 * 1000));
                    var day_hours = minus_time % (24 * 3600 * 1000);
                    var hours = Math.floor(day_hours / (3600 * 1000));
                    var mins = Math.floor(day_hours % (3600 * 1000) / (60 * 1000));

                    spans[5].innerHTML = days + "天" + hours + "h" + mins + "min";   // 倒计时
                    spans[6].innerHTML = result[i].description;

                    parent.appendChild(div);
                }
            }
        },
        error: function () {
            alert("获取所有竞赛失败");
        }
    });
}

function partIn(parent) {

    var as = parent.parentNode.getElementsByTagName('a');
    var act_id = as[1].innerHTML;
    var launcher_id = as[2].innerHTML;



}

function changeTab(index) {

    var Ids = ["#acts", "#myact"];
    var subs = document.getElementsByClassName("sub_nav");

    $(Ids[(index + 1) % 2]).hide(500);
    $(Ids[index]).show(800);

    subs[(index + 1) % 2].className = "sub_nav";
    subs[index].className = "sub_nav sub-active";

}

function hidePic(node) {

    var order = node.getElementsByTagName("span")[0];

    if (order.innerHTML.trim() == "隐藏") {
        $("#intropic").hide(600);
        // $(node).css("top", "-50px");
        order.innerHTML = "显示";
    } else {
        $("#intropic").show(600);
        // $(node).css("top", "-58px");
        order.innerHTML = "隐藏";
    }
}

function getMyLaunch() {

    var parent = document.getElementById("mylaunch");
    var copy = document.getElementById("act_copy");
    copy.getElementsByClassName("each_act")[0].style.width = "95%";

    for (var i = 0; i < 3; i++) {
        var div = document.createElement("div");
        div.innerHTML = copy.innerHTML;

        parent.appendChild(div);
    }
}

function getMyPartin() {

    var parent = document.getElementById("mypartin");
    var copy = document.getElementById("act_copy");
    copy.getElementsByClassName("each_act")[0].style.width = "95%";

    for (var i = 0; i < 3; i++) {
        var div = document.createElement("div");
        div.innerHTML = copy.innerHTML;

        parent.appendChild(div);
    }
}

function cancelModal() {
    $("#modal").bind('click', function (e) {
        var elem = e.target || e.srcElement;
        if (elem.className && elem.className == "modal_parent") {
            $('#modal').fadeOut();
        }
    });
}

function publish() {

    // 名称,开始时间,结束时间,奖励
    var inputs = document.getElementById("modal").getElementsByTagName("input");
    var textarea = document.getElementById("modal").getElementsByTagName("textarea")[0];
    var description = textarea.value;

    var span = document.getElementById("modal").getElementsByTagName("span")[0];

    textarea.onclick = function () {
        if (span.style.display != 'none') {
            $(span).hide();
        }
    };

    for (var i = 0; i < inputs.length - 1; i++) {
        inputs[i].onclick = function () {
            if (span.style.display != 'none') {
                $(span).hide();
            }
        };
    }

    if (description == '') {
        $(span).show();
        return;
    }

    for (var j = 0; j < inputs.length - 1; j++) {
        if (inputs[j].value == '') {
            $(span).show();
            return;
        }
    }

    $.ajax({
        url: '/Track/public/PublishActivity',
        type: 'post',
        data: {
            'launcher_id': USERID,
            'name': inputs[0].value,
            'description': description,
            'start_time': inputs[1].value,
            'end_time': inputs[2].value,
            'award': inputs[3].value
        },
        success: function () {
            window.location.reload();
        },
        error: function () {
            alert("连接失败");
        }
    });

}