/**
 * Created by L.H.S on 2016/10/19.
 */

window.onload = function () {
    $("#eachday").css('width', $("#eachday").width());
    getBarChart("eachday");

    getBarChart("weightchange");
    getBarChart('eachnight');
};