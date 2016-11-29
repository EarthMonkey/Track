/**
 * Created by L.H.S on 2016/10/19.
 */

var USERID = document.getElementById('storage_id').innerHTML.trim();

window.onload = function () {
    getAllDynamics();
    getMyConcerns();
    getMyFans();
}

function getAllDynamics() {

    $.ajax({
        url: '/Track/public/GetShare',
        type: 'post',
        async: false,
        success: function (result) {
            setShares('dynamics', result);
        },
        error: function () {
            alert('获取动态失败');
        }
    });
}

function setShares(parentID, result) {

    var parent = document.getElementById(parentID);
    var copy = document.getElementById("dynamic_copy");

    for (var i = 0; i < result.length; i++) {
        var div = document.createElement("div");
        div.innerHTML = copy.innerHTML;

        div.getElementsByClassName('dy_content')[0].innerHTML = result[i].content;

        var spans = div.getElementsByTagName('span');

        $.ajax({
            url: '/Track/public/GetUsername',
            type: 'get',
            async: false,
            data: {'userId': result[i].user_id},
            success: function (result) {
                spans[0].innerHTML = result[0].username;
            },
            error: function () {
                alert("获取用户名失败");
            }
        });

        spans[1].innerHTML = result[i].created_at;
        parent.appendChild(div);
    }
}

function changeTab(index) {

    var Ids = ["mydynamic", "myconcern", "myfans"];

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

function getMyConcerns() {

    var parent = document.getElementById("myconcern");
    var copy = document.getElementById("fan_info_copy");

    for (var i = 0; i < 5; i++) {
        var div = document.createElement("div");
        div.className = "each_fan";

        div.onmouseenter = function () {
            var details = this.getElementsByClassName("detail_hide");
            for (var j = 0; j < details.length; j++) {
                $(details[j]).slideDown();
            }
        };

        div.onmouseleave = function () {
            var details = this.getElementsByClassName("detail_hide");
            for (var j = 0; j < details.length; j++) {
                $(details[j]).slideUp();
            }
        };

        div.innerHTML = copy.innerHTML;
        parent.appendChild(div);
    }
}

function getMyFans() {

    var parent = document.getElementById("myfans");
    var copy = document.getElementById("fan_info_copy");

    for (var i = 0; i < 5; i++) {
        var div = document.createElement("div");
        div.className = "each_fan";

        div.onmouseenter = function () {
            var details = this.getElementsByClassName("detail_hide");
            for (var j = 0; j < details.length; j++) {
                $(details[j]).slideDown();
            }
        };

        div.onmouseleave = function () {
            var details = this.getElementsByClassName("detail_hide");
            for (var j = 0; j < details.length; j++) {
                $(details[j]).slideUp();
            }
        };

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

    var area = document.getElementsByTagName('textarea')[0];
    var content = area.value;

    if (content == '') {
        document.getElementById('modal').getElementsByTagName('span')[0].style.display = 'block';
        area.onclick = function () {
            document.getElementById('modal').getElementsByTagName('span')[0].style.display = 'none';
        }
    } else {

        $.ajax({
            url: '/Track/public/Share',
            type: 'post',
            async: false,
            data: {
                'userId': USERID,
                'content': content
            },
            success: function () {
                window.location.reload();
            },
            error: function () {
                alert('发布失败');
            }
        });

    }

}