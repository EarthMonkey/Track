/**
 * Created by L.H.S on 2016/10/17.
 */

function showPersonal() {
    $("#personalbar").slideDown("slow");

    $(document).bind('click', function (e) {
        var elem = e.target || e.srcElement;
        if (elem.className && elem.className == "fa fa-sort-desc combox") {
            return;
        }
        $('#personalbar').slideUp("normal");
    });

}

function Signout() {
    window.location.href = "/Track/resources/views/pages/Login.html";
}


/** hide show **/
var iBase = {
    SetOpacity: function (ev, v) {
        ev.filters ? ev.style.filter = 'alpha(opacity=' + v + ')'
            : ev.style.opacity = v / 100;
    }
};

function showDiv(elem_id) {

    var elem = document.getElementById(elem_id);
    var speed = 20;
    var opacity = 100;

    elem.style.display = "";
    iBase.SetOpacity(elem, 0);
    var val = 0;
    (function () {
        iBase.SetOpacity(elem, val);
        val += 5;
        if (val <= opacity) {
            setTimeout(arguments.callee, speed)
        }
    })();
}

function hideDiv(elem_id) {

    var elem = document.getElementById(elem_id);
    var speed = 15;
    var opacity = 0;

    var val = 100;
    (function () {
        iBase.SetOpacity(elem, val);
        val -= 5;
        if (val >= opacity) {
            setTimeout(arguments.callee, speed);
        } else if (val < 0) {
            elem.style.display = 'none';
        }
    })();
}
