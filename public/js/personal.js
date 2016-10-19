/**
 * Created by L.H.S on 2016/10/19.
 */

function updateInfo() {

    var bar = document.getElementsByClassName("left_nav_person")[0];
    var inputs = bar.getElementsByTagName("input");
    var is = bar.getElementsByTagName("i");

    if(is[0].style.display == "" || is[0].style.display == "none") {

        var old = new Array();

        for (var i = 0; i < inputs.length; i++) {
            if (i==inputs.length - 1) {
                inputs[i].disabled = false;
            } else {
                inputs[i].readOnly = false;
            }
            inputs[i].style.backgroundColor = "#fff";
            inputs[i].style.boxShadow = "0 0 5px #A7CF64";
            old[i] = inputs[i].value;
        }

        $(is[0]).fadeIn();
        $(is[1]).fadeIn();

        is[0].onclick = function () {
            for (var i = 0; i < inputs.length; i++) {
                if(i == inputs.length - 1) {
                    inputs[i].disabled = true;
                } else {
                    inputs[i].readOnly = true;
                }
                inputs[i].style.backgroundColor = "transparent";
                inputs[i].style.boxShadow = "none";
            }

            $(is[0]).hide();
            $(is[1]).hide();
        };

        is[1].onclick = function () {
            for (var i = 0; i < inputs.length; i++) {
                inputs[i].value = old[i];
                if(i == inputs.length - 1) {
                    inputs[i].disabled = true;
                } else {
                    inputs[i].readOnly = true;
                }
                inputs[i].style.backgroundColor = "transparent";
                inputs[i].style.boxShadow = "none";
            }

            $(is[0]).hide();
            $(is[1]).hide();
        };
    }

}