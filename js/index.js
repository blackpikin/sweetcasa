
var H = 350;
var V = 5;

function SetPointer(elem){
    elem.style.cursor = "pointer";
}
function AnimateLogo() {
    var logo = document.getElementById("logo");
    logo.style.display = "block";
    logo.setAttribute("class", "animated rollIn");
}

function AnimateStatement(){
    anime({
        targets: '#cpy',
        translateY: 250,
        delay: anime.stagger(400)
    });
}

function AnimateMenu(){
    var el = document.querySelector('.nav-menu-item');

    anime({
        targets: [el, '.nav-menu-item'],
        translateX: -1985,
        //delay: anime.stagger(100)
        delay: anime.stagger(300, {easing: 'easeOutQuad'})
    });
}

function AnimateHeaderPic(){
    anime({
        targets: '#headerpic',
        translateY: -1000,
        delay: anime.stagger(100*10)
    });
}

function AnimateHeader() {
    var tw = document.getElementById("topwhite");
    var mw = document.getElementById("midwhite");
    var bw = document.getElementById("bottomwhite");
    tw.style.display = "block";
    bw.style.display = "block";
    mw.style.display = "block";
    AnimateHeaderPic();
    AnimateMenu();
    AnimateLogo();
    document.getElementById('firstline').style.position = 'relative';
    document.getElementById('firstline').style.zIndex = 100;
    setTimeout(AnimateStatement(), 10000);
}

function GotoPage(page){
    window.location = "index.php?p=" + page;
}
function SetAnchor(item){
    item.style.textDecoration = "underline";
    item.style.cursor = "pointer";
}
function RemoveAnchor(item){
    item.style.textDecoration = "none";
}

function AnimateMenuItem(elem, box){
    var item = document.getElementById(elem);
    item.setAttribute("class", "fa fa-arrow-right animated infinite heartBeat");
    item.style.color = "#BCD851";
    box.style.cursor = "pointer";
    var audio = document.createElement('audio');
    audio.src = './audio/click1.mp3';
    audio.play();
}
function StopAnimateMenuItem(elem){
    var item = document.getElementById(elem);
    item.setAttribute("class", "");
    item.style.color = "white";
}

function AnimateLink(elem){
    elem.setAttribute("class", "animated infinite heartBeat big_title");
    elem.style.cursor = "pointer";
}
function StopAnimateLink(elem){
    elem.setAttribute("class", "big_title");
}

var span = document.getElementById('time');
var weekday = new Array(7);
weekday[0] = "Sunday";
weekday[1] = "Monday";
weekday[2] = "Tuesday";
weekday[3] = "Wednesday";
weekday[4] = "Thursday";
weekday[5] = "Friday";
weekday[6] = "Saturday";

var month = new Array(12);
month[0] = "January";
month[1] = "February";
month[2] = "March";
month[3] = "April";
month[4] = "May";
month[5] = "June";
month[6] = "July";
month[7] = "August";
month[8] = "September";
month[9] = "October";
month[10] = "November";
month[11] = "December";

function time() {
    var d = new Date();
    var s = d.getSeconds();
    var m = d.getMinutes();
    var h = d.getHours();
    var day = d.getDay();
    var M = d.getMonth();
    var Y = d.getFullYear();
    var n = weekday[d.getDay()];
    var sec = 0;
    var min = 0;
    if (s < 10){
        sec = "0"+s;
    }else{
        sec = s;
    }
    if(m < 10){
        min = "0"+m;
    }else{
        min = m;
    }

    span.textContent = n + ", " + month[M] + " " + d.getDate() + ", " + Y + "  " + h + ":" + min + ":" + sec;
}

setInterval(time, 1000);

var val = 1;var val3 = 650;
var val2 = 1;
var screenWidth = $(window).width();
function moveSlideLeft(elem){
    var s = document.getElementById(elem);
    val = val + 1;
   s.style.left = val+"px";
}

var int = setInterval(function(){
    if (H === 0){
        document.getElementById("head1").style.display = "none";
        document.getElementById("head2").style.display = "block";
        AnimateHeader();
        clearInterval(int);

        var ints1 = setInterval(function(){
            var s = document.getElementById('s1');
            var r = Math.floor((Math.random() * 3) + 1);
            if(val > screenWidth){
                val = -screenWidth;
                s.style.left = val+"px";
            }else{
                val = val + r;
                s.style.left = val+"px";
            }

        }, 1);

        var ints2 = setInterval(function(){
            var s2 = document.getElementById('s2');
            if(val2 > 720){
                val2 = 1;
                s2.style.left = val2+"px";
            }else{
                val2 = val2 + 5;
                s2.style.left = val2+"px";
            }

        }, 50);

        var ints3 = setInterval(function(){
            var s3 = document.getElementById('s3');
            if(val3 < -550){
                val3 = 820;
                s3.style.left = val3+"px";
            }else{
                val3 = val3 - 10;
                s3.style.left = val3+"px";
            }

        }, 75);

    }else{
        H = H - 2;
        V = V + 2;
        var h11 = document.getElementById("head11");
        var h12 = document.getElementById("head12");
        var hm = document.getElementById("headmove");
        h11.style.minHeight = H+"px";
        hm.style.height = V+"px";
        h12.style.minHeight = H+"px";
    }

}, 5);