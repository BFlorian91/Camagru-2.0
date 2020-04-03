const img = document.getElementById('img');
const date = document.getElementById('imgDate');
const authorImg = document.getElementById('imgAuthor');

const queryString = window.location.search;
// console.log(queryString);
const urlParams = new URLSearchParams(queryString);
const imageId = urlParams.get('imgId')
// console.log(imageId);

async function getImgId() {
    try {
        let response = await fetch('datas_camagru');
        let datas = await response.json();
        if (response.ok) {
            console.log(datas)
            for (let i = 0; i < datas.datas.numberOfImages; i++) {
                if (datas.datas.id[i] == imageId) {
                    img.src = datas.datas.images[i];
                    date.innerHTML = datas.datas.date[i];
                    authorImg.innerHTML = datas.datas.ownerOfImages[i];
                    return 1;
                }
            }
        }

    } catch(e) {
        console.error(e)
    }
}

getImgId()


const authorMsg = document.getElementsByClassName('msgAuthor');
const msg = document.getElementsByClassName('msg');

async function getComments() {
    try {
        let response = await fetch('datas_camagru');
        let datas = await response.json();
        console.log(datas.datas.comments)
        for (let i = 0; i < datas.datas.comments.numberOfComments; i++) {
            msg[i].innerHTML = "coucou";
        }
    } catch (e) {
        console.error(e);
    }
}

getComments();