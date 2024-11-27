var DOM = {
	boardsList: '.boards-list',
	boardAddbtn: '.board-add-btn',
	boardUpdatebtn: '.board-update-btn',
	boardCancelbtn: '.board-cancel-btn',
	boardInput: '.board-input',
	inputErrorMsg: '.input-error-msg',
	boardsList: '.boards-list',
	userID: '.user-id'
};


var boardsList = document.querySelector(DOM.boardsList);
boardsList.addEventListener('click', function(e) {
	if (e.target.classList.contains('board-edit')) {
		editBoard(e);
	} else if (e.target.classList.contains('board-delete')) {
		deleteBoard(e);
	}
});



var boardAddbtn = document.querySelector(DOM.boardAddbtn);
var boardUpdatebtn = document.querySelector(DOM.boardUpdatebtn);
var boardCancelbtn = document.querySelector(DOM.boardCancelbtn);


boardAddbtn.addEventListener('click', function(e) {
	var boardInput = document.querySelector(DOM.boardInput);
	var inputErrorMsg = document.querySelector(DOM.inputErrorMsg);
	
	if (isEmpty(boardInput)) {
		var msg = "No input";
		displayErrMsg(msg, inputErrorMsg, boardInput);
		return;
	}
	removeErrMsg(inputErrorMsg, boardInput);
	
	var userID = document.querySelector(DOM.userID).value; 
	var boardName = boardInput.value;
	
	ajaxAdd({name:boardName, user_id:userID}, g.boardsModel)
		.then(function(lastInsertID) {
		
			var boardID = lastInsertID;
	
			var html = `
			<div class="board-container d-inline-flex justify-content-center px-3 rounded-3 container" id="board-container--${boardID}">
          <div class="board-link-container text-center flex-fill d-flex flex-column my-2">
            <a href="${g.SROOT}boards/board/${boardID}" id="board-link--${boardID}">
              <h4 class="board-name" id="board-name--${boardID}">${boardName}</h4>
            </a>
            <div class="d-flex flex-fill justify-content-around">
              <a class="fa fa-edit board-edit" id="board-edit--${boardID}"> Edit</a></li>
              <a class="fa fa-trash board-delete" id="board-delete--${boardID}"> Delete</a></li>
            </div>
          </div>
        </div>
			`;

			var boardsList = document.querySelector(DOM.boardsList);
			boardsList.insertAdjacentHTML('beforeend', html);
		})
		.catch(function() {
			alert('error adding board');
			console.log('error adding board');
		});
	
	
	boardInput.value = "";
});


boardUpdatebtn.addEventListener('click', function(e) {
	var boardInput = document.querySelector(DOM.boardInput);
	var inputErrorMsg = document.querySelector(DOM.inputErrorMsg);
	var boardAddbtn = document.querySelector(DOM.boardAddbtn);
	var boardUpdatebtn = document.querySelector(DOM.boardUpdatebtn);
	var boardCancelbtn = document.querySelector(DOM.boardCancelbtn);
	
	if (isEmpty(boardInput)) {
		var msg = "No input";
		displayErrMsg(msg, inputErrorMsg, boardInput);
		return;
	}
	removeErrMsg(inputErrorMsg, boardInput);
	
	
	var boardID = boardUpdatebtn.dataset.boardid;
	var boardName = document.querySelector(`#board-name--${boardID}`);
	boardName.textContent = boardInput.value;
	console.log(`${boardID} | ${boardName} | ${boardName.textContent}`);
	
	ajaxUpdate({name:boardInput.value}, boardID, g.boardsModel);
	
	boardInput.value = "";
	boardUpdatebtn.dataset.boardid = "";
	
	boardAddbtn.classList.remove('hide');
	boardUpdatebtn.classList.add('hide');
	boardCancelbtn.classList.add('hide');
});



boardCancelbtn.addEventListener('click', function(e) {
	var boardInput = document.querySelector(DOM.boardInput);
	var inputErrorMsg = document.querySelector(DOM.inputErrorMsg);
	var boardAddbtn = document.querySelector(DOM.boardAddbtn);
	var boardUpdatebtn = document.querySelector(DOM.boardUpdatebtn);
	var boardCancelbtn = document.querySelector(DOM.boardCancelbtn);
	
	removeErrMsg(inputErrorMsg, boardInput);
	
	boardInput.value = "";
	boardUpdatebtn.dataset.boardid = "";
	
	boardAddbtn.classList.remove('hide');
	boardUpdatebtn.classList.add('hide');
	boardCancelbtn.classList.add('hide');
});


function editBoard(e) {
	//---------- get id
	var elementID = e.target.id;
	var boardID = getIdFromElement(elementID);
	//----------
	
	var boardInput = document.querySelector(DOM.boardInput);
	var inputErrorMsg = document.querySelector(DOM.inputErrorMsg);
	var boardAddbtn = document.querySelector(DOM.boardAddbtn);
	var boardUpdatebtn = document.querySelector(DOM.boardUpdatebtn);
	var boardCancelbtn = document.querySelector(DOM.boardCancelbtn);
	var boardName = document.querySelector(`#board-name--${boardID}`);

	removeErrMsg(inputErrorMsg, boardInput);
	boardInput.value = boardName.textContent;
	
	boardAddbtn.classList.add('hide');
	boardUpdatebtn.classList.remove('hide');
	boardCancelbtn.classList.remove('hide');
	
	boardUpdatebtn.dataset.boardid = boardID;
}


function deleteBoard(e) {
	
	//---------- get id
	var elementID = e.target.id;
	var boardID = getIdFromElement(elementID);
	//----------

	var boardInput = document.querySelector(DOM.boardInput);
	var inputErrorMsg = document.querySelector(DOM.inputErrorMsg);
	var boardAddbtn = document.querySelector(DOM.boardAddbtn);
	var boardUpdatebtn = document.querySelector(DOM.boardUpdatebtn);
	var boardCancelbtn = document.querySelector(DOM.boardCancelbtn);
	
	var conf = confirm("Are you sure?");
	if (conf === true) {
		ajaxDelete({id:boardID}, g.boardsModel);
		if (boardAddbtn.classList.contains('hide')) {
			boardUpdatebtn.dataset.boardid = "";
			boardInput.value = "";
			boardAddbtn.classList.remove('hide');
			boardUpdatebtn.classList.add('hide');
			boardCancelbtn.classList.add('hide');
			removeErrMsg(inputErrorMsg, boardInput);
		}
		var boardContainer = document.querySelector(`#board-container--${boardID}`);
		boardContainer.parentNode.removeChild(boardContainer);
	}
	
}
	

/*******************************************
GENERIC FUNCTIONS
*******************************************/
	
function displayErrMsg(msg, errorTextField, inputField) {
	inputField.classList.add('error-field');
	errorTextField.textContent = msg;
	errorTextField.classList.remove('hide');
}

function removeErrMsg(errorTextField, inputField) {
	inputField.classList.remove('error-field');
	errorTextField.textContent = "";
	errorTextField.classList.add('hide');
}
	
function isEmpty(field) {
	if (field.value == "") return true;
	return false;
}

function getIdFromElement(elementID) {
		var splitID = elementID.split('--');
		var type = splitID[0];
		var id = parseInt(splitID[1]);
		return id;
}













