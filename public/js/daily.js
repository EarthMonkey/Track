/**
 * Created by L.H.S on 2016/10/18.
 */

window.onload = function () {
    getSleepData();
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

}

function getSleepData() {
    getDashbord("dashboard", 8);
}