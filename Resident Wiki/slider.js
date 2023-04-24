var speed = 3;


var images;


var slideShow = document.getElementById('slide-show');


var img = document.createElement('img');


slideShow.appendChild(img);


var rAF = window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.msRequestAnimationFrame || function (callback) {
        return setTimeout(callback, 1000 / 60);
    };


var count;

function changeImage(timeStamp) {
    count = Math.floor(timeStamp / 1000 / speed);

while (count > images.length -1) {
    count -= images.length;
}

    img.src = images[count];

    rAF(changeImage);
}

rAF(changeImage);