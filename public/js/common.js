/**
 * Created by L.H.S on 2016/10/17.
 */

function showPersonal() {
    $("#personalbar").slideDown("slow");

    $(document).bind('click', function (e) {
        var elem = e.target || e.srcElement;
        if (elem.className && elem.className.contains('combox')) {
            return;
        }
        $('#personalbar').slideUp("normal");
    });

}

function Signout() {
    window.location.href = "/Track/resources/views/pages/Login.html";
}