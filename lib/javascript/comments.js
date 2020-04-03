const img = document.getElementById('img');
const date = document.getElementById('imgDate');
const authorImg = document.getElementById('imgAuthor');
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