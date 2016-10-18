/**
 * Created by L.H.S on 2016/10/18.
 */

window.onload = function () {
    getAllActs();
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

    $(Ids[(index + 1) % 2]).hide();
    $(Ids[index]).fadeIn(1000);

    subs[(index+1)%2].className = "sub_nav";
    subs[index].className = "sub_nav sub-active";

}