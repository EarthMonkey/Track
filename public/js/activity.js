/**
 * Created by L.H.S on 2016/10/18.
 */

window.onload = function () {
    getAllActs();
    getMyLaunch();
    getMyPartin();
};

function getAllActs() {

    var parent = document.getElementById("acts");
    var copy = document.getElementById("act_copy");

    for (var i = 0; i < 5; i++) {
        var div = document.createElement("div");
        div.innerHTML = copy.innerHTML;

        parent.appendChild(div);
    }
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
