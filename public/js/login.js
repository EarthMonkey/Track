/**
 * Created by L.H.S on 2016/10/16.
 */

// 0切换到登录；1切换到注册
function change(syb) {
    Ids = ["log", "reg"];
    var current = (syb + 1) % 2;
    $("#" + Ids[current]).hide();
    showDiv(Ids[syb]);
}

function login() {
    window.location.href = "/Track/resources/views/pages/HomePage.html";
}

function Register() {

}


function showDiv(elem_id) {
    $("#" + elem_id).fadeIn("slow");
}


/** homepage **/
function showIntro(index) {

    var parent = document.getElementsByClassName("each_pic")[index];
    var intro = ["<div style='text-align:center;font-style: italic;'>&lt;赛迹&gt;<br></div>在这里您可以发起竞赛，也可以参与其他用户发起的竞赛",
        "<div style='text-align:center;font-style:italic;'>&lt;日迹&gt;<br></div>这里记录了您每天的运动数据、睡眠时间及体重变化",
        "<div style='text-align:center;font-style:italic;'>&lt;足迹&gt;<br></div>这里有您燃烧掉的卡路里、抛物线降落的体重，以及每个有我陪伴的夜晚",
        "<div style='text-align:center;font-style:italic;'>&lt;人迹&gt;<br></div>这里见证了所有人挑战自我的执着，瓜分了每个人半途而废的念想"];

    parent.style.opacity = "0.7";
    parent.style.boxShadow = "0 0 10px #cad2f7";
    var div = parent.getElementsByClassName("intro_text_over")[0];
    div.innerHTML = intro[index];
    $(div).fadeIn();
    parent.appendChild(div);
}

function hideIntro(index) {
    var parent = document.getElementsByClassName("each_pic")[index];
    var child = parent.getElementsByClassName("intro_text_over")[0];
    $(child).hide();
    parent.style.opacity = "1";
    parent.style.boxShadow = "0 0 7px #d8d8d8";
}