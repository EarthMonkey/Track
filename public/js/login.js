/**
 * Created by L.H.S on 2016/10/16.
 */

var iBase = {
    SetOpacity : function(ev, v) {
        ev.filters ? ev.style.filter = 'alpha(opacity=' + v + ')'
            : ev.style.opacity = v / 100;
    }
};

// 0切换到登录；1切换到注册
function change(syb) {
    Ids = ["log", "reg"];
    var current = (syb + 1) % 2;
    $("#"+Ids[current]).hide();
    showDiv(Ids[syb]);
}

function showDiv(elem_id) {

    var elem = document.getElementById(elem_id);
    var speed = 20;
    var opacity = 100;

    elem.style.display = "block";
    iBase.SetOpacity(elem, 0);
    var val = 0;
    (function() {
        iBase.SetOpacity(elem, val);
        val += 5;
        if (val <= opacity) {
            setTimeout(arguments.callee, speed)
        }
    })();
}

function login() {
    window.location.href = "/Track/resources/views/pages/HomePage.html";
}