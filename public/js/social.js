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

        var dy_zan = div.getElementsByClassName('dy_zan');
        var thumbs = dy_zan[1].getElementsByTagName('span')[0];

        var a = document.createElement('a');
        a.style.display = 'none';
        a.innerHTML = result[i].id;
        dy_zan[1].appendChild(a);

        $.ajax({
            url: '/Track/public/GetThumbs',
            type: 'get',
            async: false,
            data: {
                'sh_id': result[i].id
            },
            success: function (result) {
                thumbs.innerHTML = result;
            },
            error: function () {
                alert('获取点赞数失败');
            }
        });

        // 是否已点赞
        $.ajax({
            url: '/Track/public/AlreadyThumb',
            type: 'get',
            async: false,
            data: {
                'userId': USERID,
                'sh_id': result[i].id
            },
            success: function (result) {
                if (result > 0) {
                    dy_zan[1].style.color = '#44d338';
                }
            },
            error: function () {
                alert('获取点赞数失败');
            }
        });

        dy_zan[1].onclick = function () {
            thumbUp(this);
        };

        spans[1].innerHTML = result[i].created_at;
        parent.appendChild(div);
    }
}

function thumbUp(node) {

    var sh_id = node.getElementsByTagName('a')[0].innerHTML;
    var thumbs = node.getElementsByTagName('span')[0];

    $.ajax({
        url: '/Track/public/ThumbUp',
        type: 'post',
        async: false,
        data: {
            'sh_id': sh_id,
            'userId': USERID
        },
        success: function (result) {
            if (result > 0) {
                thumbs.innerHTML++;
                node.style.color = '#44d338';
            } else {
                thumbs.innerHTML--;
                node.style.color = '#2a9321';
            }
        },
        error: function () {
            alert('点赞失败');
        }
    });

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
    $.ajax({
        url: '/Track/public/GetConcern',
        type: 'post',
        async: false,
        data: {
            'user_id': USERID
        },
        success: function (result) {
            for (var i = 0; i < result.length; i++) {
                setUsers("concerns", result[i]);
            }
        },
        error: function () {
            alert('获取关注信息失败');
        }
    });
}

function getMyFans() {
    $.ajax({
        url: '/Track/public/GetFans',
        type: 'post',
        async: false,
        data: {
            'user_id': USERID
        },
        success: function (result) {
            for (var i = 0; i < result.length; i++) {
                setUsers("myfans", result[i]);
            }
        },
        error: function () {
            alert('获取粉丝信息失败');
        }
    });
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

function search() {

    var input = document.getElementsByClassName('search_div')[0].getElementsByTagName('input').value;

    if (input == '') {
        return;
    }

    $.ajax({
        url: '/Track/public/Search',
        type: 'post',
        async: false,
        data: {
            'key': input
        },
        success: function (result) {
            $('#concerns').hide();
            $('#searchs').show();
            setUsers('searchs', result);
        },
        error: function () {
            alert("搜索失败");
        }
    });
}

function setUsers(parentId, result) {

    var parent = document.getElementById(parentId);
    var copy = document.getElementById("fan_info_copy");

    for (var i = 0; i < result.length; i++) {
        var div = document.createElement("div");
        div.className = "each_fan";

        div.onclick = function () {
            var details = this.getElementsByClassName("detail_hide");
            for (var j = 0; j < details.length; j++) {
                $(details[j]).slideToggle();
            }
        };

        div.innerHTML = copy.innerHTML;

        var addbtn = div.getElementsByClassName('add_btn')[0];

        var alreadyin = 0;
        $.ajax({
            url: '/Track/public/AlreadyConcern',
            type: 'get',
            async: false,
            data: {
                'user_id': USERID,
                'concern_id': result[i].id
            },
            success: function (result) {
                alreadyin = result;
            },
            error: function () {
                alert('获取关注信息失败');
            }
        });

        if(alreadyin > 0) {
            addbtn.style.display = 'none';
        } else {
            var a = document.createElement('a');
            a.style.display = 'none';
            a.innerHTML = result[i].id;
            addbtn.appendChild(a);

            addbtn.onclick = function () {
                addConcern(this);
            };
        }

        var inputs = div.getElementsByTagName('input');
        inputs[0].value = result[i].username;
        inputs[1].value = result[i].province + ' ' + result[i].city + ' ' + result[i].location;
        inputs[2].value = result[i].blog;
        inputs[3].value = result[i].email;
        inputs[4].value = result[i].birthday;


        parent.appendChild(div);
    }
}

function addConcern(node) {

    var concern_id = node.getElementsByTagName('a')[0].innerHTML.trim();

    $.ajax({
        url: '/Track/public/AddConcern',
        type: 'post',
        async: false,
        data: {
            'user_id': USERID,
            'concern_id': concern_id
        },
        success: function () {
            window.location.reload();
        },
        error: function () {
            alert('关注失败');
        }
    });

}