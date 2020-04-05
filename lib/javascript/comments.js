const img = document.getElementById('img');
const date = document.getElementById('imgDate');
const authorImg = document.getElementById('imgAuthor');


// FETCH IMAGE DATAS 

async function getImgId() {
	try {
		let response = await fetch('datas_camagru');
		let datas = await response.json();
		if (response.ok) {

			for (let i = 0; i < datas.datas.numberOfImages; i++) {
				if (datas.datas.id[i] == imageId) {
					img.src = datas.datas.images[i];
					date.innerHTML = datas.datas.date[i];
					authorImg.innerHTML = datas.datas.authorsImages[i];
					return 1;
				}
			}
		}

	} catch (e) {
		console.error(e)
	}
}

getImgId()


// FETCH ALL COMMENTS

const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const imageId = urlParams.get('imgId')
const authorMsg = document.getElementById('msgAuthor');
const msg = document.getElementsByClassName('msg');
const divDisplayMessages = document.getElementById('displayMessages')

async function getComments() {
	try {

		(async () => {
			let response = await fetch('getComments?imgId=' + imageId, {
				method: 'POST',
				headers: {
          'X-Requested-With': 'xmlhttprequest'
				},
				body: ''
			});
			let datas = await response.json();
			if (response.ok) {
				
				for (let i = 0; i < datas.datas.numberOfComments; i++) {
					
					let divBody = document.createElement('div');
					divBody.setAttribute('class', 'card mb-3 bg-dark text-white');
					
					let msg = document.createElement('p');
					msg.innerHTML = datas.datas.comment[i][0];
					msg.setAttribute('class', 'card-text ml-4 mb-3 mr-4')
							
					let author = document.createElement('h5');
					author.innerHTML = datas.datas.authorMsg[i];
					author.setAttribute("class", "card-title ml-3 mt-2 font-poppins text-info");
					
					divBody.appendChild(author);
					divBody.appendChild(msg);
					
					divDisplayMessages.appendChild(divBody);
				}
			}
		})()
	} catch(e) {
		console.error(e);
	}
}

getComments();