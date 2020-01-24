const video = document.querySelector("video")
const snapshot = document.querySelector("takeSnap")
const canvas = document.querySelector("canvas")
const reloadBtn = document.getElementById("reload")
const takeSnapBtn = document.getElementById("takeSnap")
const floppyBtn = document.getElementById("save")
const recycle = document.getElementById("delete")


if (navigator.mediaDevices.getUserMedia) {
  navigator.mediaDevices.getUserMedia({ video: true })
    .then(function(stream) { 
      video.srcObject = stream
    })
    .catch(function (err) {
      console.log("Something went wrong: " + err);
    });
} else {
  console.log("We need an uploader here !")
}

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
}