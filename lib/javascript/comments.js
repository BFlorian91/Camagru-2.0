const img = document.getElementById('img');
const date = document.getElementById('imgDate');
const authorImg = document.getElementById('imgAuthor');


// GET IMAGE DATAS 
async function getImgId() {
	try {
		let response = await fetch('api_images');
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


// GET COMMENTS
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const imageId = urlParams.get('imgId')
const authorMsg = document.getElementById('msgAuthor');
const msg = document.getElementsByClassName('msg');
const divDisplayMessages = document.getElementById('displayMessages')

async function getComments(imageId, option) {
	
	try {
		(async () => {
			let response = await fetch(`api_comments?req=get&imgId=${imageId}&option=${option}`, {
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

getComments(imageId, 'none');


// POST COMMENTS

const msgPost = document.getElementById('message');
const commentForm = document.getElementById('commentForm');

commentForm.addEventListener("submit", async e => {
	e.preventDefault();
	try {
		let datasPost = new FormData(commentForm);

		let response = await fetch('api_comments?req=post&imgId=' + imageId, {
			method: 'POST',
			headers: {
				'X-Requested-Width': 'xmlhttprequest'
			},
			body: datasPost
		});
			await getComments(imageId, 'last');

		if (response.ok) {
			console.log("Put a message has been send banner here in html");
			document.getElementById('message').value = '';
		}
	} catch(e) {
		console.error(e);
	}
})