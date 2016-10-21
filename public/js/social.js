/**
 * Created by L.H.S on 2016/10/19.
 */

window.onload = function () {
    getAllDynamics();
    getMyConcerns();
    getMyFans();
}

function getAllDynamics() {

    var parent = document.getElementById("dynamics");
    var copy = document.getElementById("dynamic_copy");

    for (var i = 0; i < 5; i++) {
        var div = document.createElement("div");
        div.innerHTML = copy.innerHTML;

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

        div.innerHTML = copy.innerHTML;
        parent.appendChild(div);
    }
}