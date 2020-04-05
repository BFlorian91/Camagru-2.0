JsOsaDAS1.001.00bplist00�Vscript_	�const img = document.getElementById('img');
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
            // console.log(datas)
            for (let i = 0; i < datas.datas.numberOfImages; i++) {
                if (datas.datas.id[i] == imageId) {
                    img.src = datas.datas.images[i];
                    date.innerHTML = datas.datas.date[i];
                    authorImg.innerHTML = datas.datas.authorsImages[i];
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

// async function getComments() {
//     try {
//         let response = await fetch('datas_camagru');
//         let datas = await response.json();
//         const list = document.createElement('ul');

//         console.log(datas.datas.comments)
//         for (let i = 0; i < datas.datas.comments[i].numberOfComments; i++) {
//             let li = document.createElement('li');
//             li.textContent = datas.datas.comments[i].authorMsg[i];
//             // authorMsg[i].innerHTML = datas.datas.comments[i].authorMsg[i];
//             list.appendChild(li);
//             authorMsg.append(list);
//             msg[i].innerHTML = datas.datas.comments[i].comment[i][0];
//         }
//     } catch (e) {
//         console.error(e);
//     }
// }

async function getComments() {

    // console.log('this a true data: ' + data)
    try {
        (async () => {
            let response = await fetch('getComments', {
                method: 'POST',
                headers: {
                    'X-Requested-Width': 'xmlhttprequest'
                },
                body: imageId
            });
            let responseDatas = await response.json();
            if (response.ok) {
                console.log(responseDatas);
                return true;
            }
        })()
    } catch(e) {
        console.error(e);
    }
}

getComments();                              	� jscr  ��ޭ