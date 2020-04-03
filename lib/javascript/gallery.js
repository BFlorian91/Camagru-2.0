const img = document.getElementsByClassName('imgGal');
const imgDate = document.getElementsByClassName('imgDate');

// async function checkIfConnected() {
  
//   try {
//     let response = await fetch('datas_camagru');
//     let datas = await response.json();

//     return datas.datas.userIsConnected
//   } catch(e) {
//     console.error(e);
//   }
// }

async function getImg() {

    try {
        let response = await fetch('datas_camagru');
        let datas = await response.json();
        if (response.ok) {

          for (let i = 0; i < datas.datas.numberOfImages; i++) {
            img[i].src = datas.datas.images[i];
            imgDate[i].innerHTML = datas.datas.date[i];
          }
        }
        } catch (e) {
          console.error(e);
        }
}

getImg()


// COMMENTS

const commentsForm = document.getElementsByClassName('commentsFrom');
const commentsCount = document.getElementsByClassName('commentsCount');


async function getNbComments() {

    try {
        let response = await fetch('datas_camagru');
        let datas = await response.json();

        for (let i = 0; i < datas.datas.numberOfImages; i++) {
        // console.log(datas.datas.comments[i].numberOfComments);
            if (response.ok) {
                commentsCount[i].innerHTML = datas.datas.comments[i].numberOfComments;
            }
        }
    } catch (e) {
        console.error(e);
    }
}

getNbComments();


// LIKE

const likeForm = document.getElementsByClassName('likesForm')
const likeStyle = document.getElementsByClassName('likeStyle')
const likeCount = document.getElementsByClassName('likeCount')

async function getLikeStatus () {

  try {
    let response = await fetch('datas_camagru');
    let datas = await response.json();
    
    for (let i = 0; i < likeForm.length; i++) {
      if (response.ok) {

        likeCount[i].innerHTML = datas.datas.likes[i];
        likeStyle[i].style.color = datas.datas.likesStatus[i] == 1 ? "red" : "#050608";
        // console.log(datas.datas.likesStatus[i])
      }
      
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