/**
 * Created by L.H.S on 2016/10/19.
 */

window.onload = function () {
    getAllDynamics();
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