const likeForm = document.getElementsByClassName('likeForm')
const likeStyle = document.getElementsByClassName('likeStyle')
const likeCount = document.getElementsByClassName('likeCount')

async function getLikeStatus () {

  try {
    let response = await fetch('getLikeStatus');
    let datas = await response.json();
    let indexOfNbLike = 0;
    let indexOfStatusLike = 1;
    
    for (let i = 0; i < likeForm.length; i++) {
      if (response.ok) {
        likeCount[i].innerHTML = datas[indexOfNbLike];
        likeStyle[i].style.color = datas[indexOfStatusLike] == 1 ? "red" : "#050608";
      }
      
      indexOfNbLike += 2;
      indexOfStatusLike += 2;
    }
  } catch(e) {
    console.error(e);
  }
}

getLikeStatus();

for (let i = 0; i < likeForm.length; i++) {
  likeForm[i].addEventListener("submit", async e => {
    e.preventDefault();
    try {
      let datasPost = new FormData(likeForm[i]);
      let response = await fetch(likeForm[i].getAttribute('action'), {
        method: 'POST',
        headers: {
          'X-Requested-With': 'xmlhttprequest'
        },
        body: datasPost
      });
      let responseData = await response.json();

      if (response.ok) {
        likeCount[i].innerHTML = responseData[1];
        likeStyle[i].style.color = responseData[0] == 1 ? "red" : "#050608";
      }
    } catch (e) {
      console.error(e);
    }
  })
}




// const xhr = new XMLHttpRequest()
// // forms class html
// const likeForm = document.getElementsByClassName('likeForm')
// const likeStyle = document.getElementsByClassName('likeStyle')
// const likeCount = document.getElementsByClassName('likeCount')

// for (let i = 0; i < likeForm.length; i++) {

//   const datasPost = new FormData(likeForm[i])

//   xhr.onreadystatechange = function() {
//     if (this.readyState == 4 && this.status == 200) {
//       console.log(this.response)
//       likeCount[i].innerHTML = this.response[1]
//       likeStyle[i].style.color = this.response[0] == 1 ? "red" : "#050608"
//     }
//   }
//   xhr.open("POST", "/explore", true)
//   xhr.responseType = "json"
//   xhr.send(datasPost)
// }

// for all element with class likeForm addlistener
// for (let i = 0; i < likeForm.length; i++) {
//   likeForm[i].addEventListener("submit", e => {
    
//     e.preventDefault()
    
//     const datasPost = new FormData(likeForm[i])

//     // DEBUG /////////////////////////
//     console.log("Clicked image: " + i);
//     ////////////////////////////////// 

//     xhr.onreadystatechange = function() {
//       if (this.readyState == 4 && this.status == 200) {
//         console.log(this.response[1])
//         likeCount[i].innerHTML = this.response[1]
//         likeStyle[i].style.color = this.response[0] == 1 ? "red" : "#050608"
//       } else if (this.readyState == 4) {
//         console.log("[ERROR] Ajax")
//       }
//     }
//     xhr.open("POST", "/explore", true)
//     xhr.responseType = "json"
//     xhr.send(datasPost);
//   }) 
// }

