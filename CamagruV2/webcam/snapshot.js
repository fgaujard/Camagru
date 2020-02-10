'use strict';

const video = document.getElementById('video');
const canvas = document.getElementById('canvas');
const snap = document.getElementById('snap');
const errorMsgElement = document.getElementById('snapErrorMsg');

const file = document.getElementById('file');
const view = document.getElementById('view');

const constraints = {
    audio: false,
    video: {
        width: 1280, height: 720
    }

};

async function init(){
    try{
        const stream = await navigator.mediaDevices.getUserMedia(constraints);
        handleSuccess(stream);
    }
    catch(e){
        errorMsgElement.innerHTML = 'navigator.getUserMedia.error:${e.toString()}';
    }
}

//success
function handleSuccess(stream){
    window.stream = stream;
    video.srcObject = stream;
}

//Load init
init();

//Draw Image
var context = canvas.getContext('2d');
snap.addEventListener("click", function(){
    context.drawImage(video, 0, 0, 640, 480);
})

//to do : input and preview
var context = canvas.getContext('2d');
view.addEventListener("click", function(){
    context.drawImage(file, 0, 0, 640, 480);
})