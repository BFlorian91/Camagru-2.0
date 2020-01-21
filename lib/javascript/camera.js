const video = document.querySelector("#video")
const capture = document.querySelector("#capture")

if (navigator.mediaDevices.getUserMedia) {
  navigator.mediaDevices.getUserMedia({ video: true })
    .then(function (stream) {
      video.srcObject = stream
    })
    .catch(function (err) {
      console.log("Something went wrong: " + err);
    });
} else {
  console.log("We need an uploader here !")
}

function takeSnapshot() {
  const canvas = document.querySelector("canvas")
  const context = canvas.getContext("2d")

  const width = video.offsetWidth
  const height = video.offsetHeight

  console.log(video.offsetWidth)
  console.log(video.offsetHeight)

  if (width && height) {
    context.drawImage(video, 0, 0, width, height)
    video.style.display = "none"
    canvas.style.display = "block"
    return canvas.toDataURL("img/png")
  }
}