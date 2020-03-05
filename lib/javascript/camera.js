const video = document.querySelector("video")
const snapshot = document.querySelector("takeSnap")
const canvas = document.querySelector("canvas")
const reloadBtn = document.getElementById("reload")
const takeSnapBtn = document.getElementById("takeSnap")
const floppyBtn = document.getElementById("save")
const recycle = document.getElementById("delete")
const uploadBtn = document.getElementById("uploader")


// if (navigator.mediaDevices.getUserMedia) {
//   navigator.mediaDevices.getUserMedia({ video: true })
//     .then(function(stream) { 
//       video.srcObject = stream
//     })
//     .catch(function (err) {
//       console.log("Something went wrong: " + err);
//     });
// } else {
//   console.log("We need an uploader here !")
// }

// Take snapshot
function takeSnapshot() {
  const width = video.videoWidth
  const height = video.videoHeight
  canvas.getContext("2d").drawImage(video, 0, 0, width / 2, height / 2)
  video.style.display = "none"
  canvas.style.display = "block"
  takeSnapBtn.style.display = "none"
  reloadBtn.style.display = "block"
  floppyBtn.style.display = "block"
  recycle.style.display = "block"
  uploadBtn.style.display = "none"


  return canvas.toDataURL("img/png")
}

// Reload camera
function reloadCamera() {
  canvas.style.display = "none"
  video.style.display = "block"
  reloadBtn.style.display = "none"
  takeSnapBtn.style.display = "block"
  floppyBtn.style.display = "none"
  recycle.style.display = "none"
  uploadBtn.style.display = "block"
}

(() => {

  let width = 500;
  let height = 0;

  // video from the camera. Start at false.

  let streaming = false;

  let video = null;
  let canvas = null;
  let photo = null;
  let img = null;

  let startButton = null;
  let clearButton = null;

  function startup() {
    video = document.getElementById('video');
    canvas = document.getElementById('canvas');
    photo = document.getElementById('photo');
    img = document.getElementById('img');
    startButton = document.getElementById('takeSnap');
    clearButton = document.getElementById('delete');

    this.canvas.style.display = 'none';
    navigator.mediaDevices.getUserMedia({video: true, audio: false})
    .then((stream) => {
      video.srcObject = stream;
      video.play();
    })
    .catch((err) => {
      console.log("An error occurred: " + err);
    });

    video.addEventListener('canplay', (ev) => {
      if (!streaming) {
        height = video.videoHeight / (video.videoWidth/width);
      
        // For Firefox Bug (the height can't be read from)
      
        if (isNaN(height)) {
          height = width / (4/3);
        }
      
        video.setAttribute('width', width);
        video.setAttribute('height', height);
        canvas.setAttribute('width', width);
        canvas.setAttribute('height', height);
        streaming = true;
      }
    }, false);

    startButton.addEventListener('click', (ev) => {
      takePicture();
      ev.preventDefault();
    }, false);
    
    clearButton.addEventListener('click', (ev) => {
      clearPicture();
      ev.preventDefault();
    }, false);

    clearPicture();
  }

  // Fill the photo with an indication that none has been
  // captured.

  function clearPicture() {
    let context = canvas.getContext('2d');
    context.fillStyle = "#FFF";
    context.fillRect(0, 0, canvas.width, canvas.height);

    this.video.style.display = 'block';
    this.canvas.style.display = 'none';
    this.photo.style.display = 'none';
  }

  function takePicture() {
    let context = canvas.getContext('2d');
    if (width && height) {
      canvas.width = width;
      canvas.height = height;
      context.drawImage(video, 0, 0, width, height);
    
      let data = canvas.toDataURL('image/png');
      photo.setAttribute('src', data);
      // console.log(data);
      // sendImg(data);
      this.img.value = data;
      this.video.style.display = 'none';
      this.canvas.style.display = 'block';
    } else {
      clearPicture();
    }
  }

  function sendImg(imgTaken)
  {
    const xhr = new XMLHttpRequest();

    xhr.open("POST", "/model/ActionMontage.php");
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("this is a test");
}
  // Set up our event listener to run the startup process
  // once loading is complete.

  window.addEventListener('load', startup, false);
})();

document.getElementById("save").onclick = () => {
  document.getElementById("formPostImg").submit()
}