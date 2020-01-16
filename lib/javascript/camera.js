// (() => {

//   let streaming = true,
//     video       = document.querySelector('#video'),
//     canvas      = document.querySelector('#canvas'),
//     photo       = document.querySelector('#photo'),
//     startBut    = document.querySelector('#startButton'),
//     width       = 640,
//     height      = 480;


//   navigator.getMedia(
//     {
//       video: true,
//       audio: false
//     },
    
//     (stream) => {
//       video.src = window.URL.createObjectURL(stream);
//       if (navigator.mozGetUserMedia) {
//         video.mozSrcObject = stream
//       } else {
//         const vendorURL = window.URL || window.webkitURL
//         video.src = vendorURL.createObjectURL(stream)
//       }
//       video.play()
//     },
//     err => {
//       console.log("An error occured ! " + err)
//     })
    
    // video.addEventListener('canplay', ev => {
    //   if (!streaming) {
    //     height = video.videoHeight / (video.videoWidth / width)
    //     video.setAttribute('width', width)
    //     video.setAttribute('height', height)
    //     canvas.setAttribute('width', width)
    //     canvas.setAttribute('height', height)
    //     streaming = true
    //   }
    // }, false)

//     startBut.addEventListener('click', e => {
//       takePicture()
//       e.preventDefault()
//     }, false)

//     function takePicture() {
//       canvas.width = width
//       canvas.height = height
//       canvas.getContext('2d').drawImage(video, 0, 0, width, height)
//       const data = canvas.toDataURL('image/png')
//       photo.setAttribute('src', data)
//     }
//   }
// )

const video = document.querySelector("#video")
const capture = document.querySelector("#capture")

if (navigator.mediaDevices.getUserMedia) {
  navigator.mediaDevices.getUserMedia({ video: true })
    .then(function (stream) {
      video.srcObject = stream;
    })
    .catch(function (err0r) {
      console.log("Something went wrong!");
    });
}