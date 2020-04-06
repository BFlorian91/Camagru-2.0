
(async function () {

  try {
    let response = await fetch('api_images?req=get');
    let datas = await response.json();
    if (response.ok) {

      const container = document.getElementById('container');
      const userIsConnected = datas.datas.userIsConnected;
      
      for (let i = 0; i < datas.datas.numberOfImages; i++) {

        // CARD 
        let divCol = document.createElement('div');
        divCol.setAttribute('class', 'col');
        container.appendChild(divCol);

        let divRow = document.createElement('div');
        divRow.setAttribute('class', 'row justify-content-center');
        divCol.appendChild(divRow);

        let card = document.createElement('div');
        card.setAttribute('class', 'pl-0 pr-0 mb-4 border border-info');
        card.setAttribute('style', 'max-width: 500px; box-shadow: 6px 6px 6px black;');
        divRow.appendChild(card);


        // IMAGES 
        let divImg = document.createElement('div');
        divImg.setAttribute('class', 'w-100 overflow-hidden');
        card.appendChild(divImg);

        let img = document.createElement('img');
        img.setAttribute('class', 'w-100 thumb-zoom');
        img.src = datas.datas.images[i];
        divImg.appendChild(img);


        // DATAS => DATES COMMENTS LIKES
        let divDatas = document.createElement('div');
        divDatas.setAttribute('class', 'row justify-content-center rounded-bottom bg-unique-color lighten-3 text-center pt-3 pb-1');
        card.appendChild(divDatas);

        let ul = document.createElement('ul');
        ul.setAttribute('class', 'w-75 list-unstyled list-inline font-small');
        divDatas.appendChild(ul);

        let alignDatas = document.createElement('div');
        alignDatas.setAttribute('class', 'row');
        ul.appendChild(alignDatas);


        // DATES
        let divDate = document.createElement('div');
        divDate.setAttribute('class', 'col-6 mt-2');
        alignDatas.appendChild(divDate);

        let liDate = document.createElement('div');
        liDate.setAttribute('class', 'list-inline-item row justify-content-center');
        divDate.appendChild(liDate);

        let iDate = document.createElement('i');
        iDate.setAttribute('class', 'far fa-clock text-warning table');
        liDate.appendChild(iDate);

        let date = document.createElement('p');
        date.setAttribute('class', 'text-white mt-2 font-roboto');
        iDate.appendChild(date);
        date.innerHTML = datas.datas.date[i];


        // COMMENTS 
        let divCom = document.createElement('div');
        divCom.setAttribute('class', 'col-3 mt-2');
        alignDatas.appendChild(divCom);

        let liCom = document.createElement('li');
        liCom.setAttribute('class', 'list-inline-item row justify-content-center');
        divCom.appendChild(liCom);

        let formCom = document.createElement('form');
        formCom.setAttribute('class', 'commentForm');
        divCom.appendChild(formCom);

        let inputImgId = document.createElement('input');
        inputImgId.setAttribute('type', 'hidden');
        inputImgId.value = datas.datas.id[i];
        formCom.appendChild(inputImgId);
        
        let subCom = document.createElement('button');
        subCom.setAttribute('style', 'background-color: rgba(0,0,0,0); border: none');
        formCom.appendChild(subCom);

        let iComs = document.createElement('icon');
        iComs.setAttribute('class', 'far fa-comments text-info');
        subCom.appendChild(iComs);

        // NUMBER OF COMMENTS 
        let pCountComs = document.createElement('p');
        pCountComs.setAttribute('class', 'commentsCount text-white mt-2 font-roboto');
        iComs.appendChild(pCountComs);
        pCountComs.innerHTML = datas.datas.comments[i].numberOfComments


        // LIKES
        let divLike = document.createElement('div');
        divLike.setAttribute('class', 'col-3 mt-2');
        alignDatas.appendChild(divLike);

        let liLike = document.createElement('li');
        liLike.setAttribute('class', 'list-inline-item row justify-content-center');
        divLike.appendChild(liLike);

        let formLike = document.createElement('form');
        formLike.setAttribute('class', 'likesForm');
        liLike.appendChild(formLike);

        let inputImgIdLike = document.createElement('input');
        inputImgIdLike.setAttribute('type', 'hidden');
        inputImgIdLike.value = datas.datas.id[i];
        formLike.appendChild(inputImgIdLike);

        let subLike = document.createElement('button');
        subLike.setAttribute('type', 'submit');
        subLike.setAttribute('style', 'background-color: rgba(0,0,0,0); border: none');
        formLike.appendChild(subLike);

        let iLikes = document.createElement('i');
        iLikes.setAttribute('class', 'likesStyle fas fa-heart');
        subLike.appendChild(iLikes);
        if (userIsConnected) {
          iLikes.setAttribute('style', datas.datas.likesStatus[i] == 1 ? 'color: red;' : 'color: #050608;');
        }

        let pCountLikes = document.createElement('p');
        pCountLikes.setAttribute('class', 'likesCount text-white mt-2 font-roboto');
        iLikes.appendChild(pCountLikes);
        pCountLikes.innerHTML = datas.datas.likes[i]
      }
    }
  } catch (e) {
    console.error(e);
  }
})();


// // // COMMENTS DATAS
// const commentsForm = document.getElementsByClassName('commentsFrom');
// const commentsCount = document.getElementsByClassName('commentsCount');


// // LIKE
// const likeForm = document.getElementsByClassName('likesForm')
// const likeStyle = document.getElementsByClassName('likeStyle')
// const likeCount = document.getElementsByClassName('likeCount')


// // LISTENER FOR LIKE ACTION
// const alert = document.getElementById('alert');

// (async function () {

//   try {
//     let response = await fetch('api_images');
//     let datas = await response.json();

//     let userIsConnected = datas.datas.userIsConnected;
    
//       for (let i = 0; i < likeForm.length; i++) {
//         likeForm[i].addEventListener("submit", async e => {
//           e.preventDefault();
//           if (userIsConnected) {
//           try {
//             let datasPost = new FormData(likeForm[i]);
//             let response = await fetch(likeForm[i].getAttribute('action'), {
//               method: 'POST',
//               headers: {
//                 'X-Requested-With': 'xmlhttprequest'
//               },
//               body: datasPost
//             });
//             let responseData = await response.json();
            
//             if (response.ok) {
//               likeCount[i].innerHTML = responseData[1];
//               if (datas.datas.userIsConnected) {
//                 likeStyle[i].style.color = responseData[0] == 1 ? "red" : "#050608";
//               }
//             }
//           } catch (e) {
//             console.error(e);
//             }
//           } else {
//             // USER IS NOT CONNECTED ERROR GESTION    
//             window.scrollTo({
//               top:0,
//               behavior: 'smooth'
//             });
//             alert.innerHTML = '<div class="alert alert-danger" role="alert">You must be connected for like images !</div>'
//             if (alert.style.opacity == '0') {
//               alert.style.opacity = '1';
//             }
//             setTimeout(() => {
//               alert.style.opacity = '0';
//             }, 3000);
//           }            
//         })
//       }
//   } catch (e) {
//     console.error(e);
//   }
// })()

// for (let i = 0; i < commentsForm.length; i++) {
//   commentsForm[i].addEventListener("submit", async e => {
//     e.preventDefault();
//     try {
//       let datasPost = new FormData(commentsForm[i]);
//       let response = await fetch('api_images?req=post&type=com', {
//         method: 'POST',
//         headers: {
//           'X-Requested-Width' : 'xmlhttprequest'
//         },
//         body: datasPost
//       });
//       if (response.ok) { console.log(imageId) }
//     } catch(e) {
//       console.error(e);
//     }
//   })
// }