/**
 * Created by L.H.S on 2016/10/18.
 */

function changeTab(index) {

    var Ids = ["mysport", "mysleep", "mybody"];

    document.getElementById(Ids[(index + 1) % 3]).style.display = "none";
    document.getElementById(Ids[(index + 2) % 3]).style.display = "none";

    if (document.getElementById(Ids[index]).style.display == "none") {
        $("#"+Ids[index]).fadeIn("slow");
    }

    var subs = document.getElementsByClassName("sub_nav");
    subs[(index + 1) % 3].className = "sub_nav";
    subs[(index + 2) % 3].className = "sub_nav";
    subs[index].className = "sub_nav sub-active";

}