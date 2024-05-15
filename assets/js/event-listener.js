 //// JavaScript Document
//var elMsg = document.getElementById('feedback');
var elUsername = document.getElementById('username');
var elPassword = document.getElementById('password');
var elEmail = document.getElementById('email');
var elFirstname=document.getElementById('firstname');
var elLastname=document.getElementById('lastname');
var elPhone=document.getElementById('phone');
var elComment=document.getElementById('comment');


function validateUserPass(minLength, inputId, feedback, group)
{
	var el = document.getElementById(inputId);
	var elMsg = document.getElementById(feedback);
	var mainDiv=document.getElementById(group); 
	if (el.value.length < minLength)
	{
		elMsg.innerHTML = inputId.toUpperCase() + ' must be '+minLength+' characters or more';
		mainDiv.classList.add("has-error");
	}
	else
	{
		elMsg.innerHTML = '';
		mainDiv.classList.remove("has-error")
	}
}

function validateEmail(email, feedback, group)
{
	var elEmail = document.getElementById(email);
	var elMsg = document.getElementById(feedback);
	var mainDiv=document.getElementById(group); 
	var validRegex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if (elEmail.value.match(validRegex))
		{
			elMsg.innerHTML = '';
			mainDiv.classList.remove("has-error")
		}
	
	else
		{
		elMsg.innerHTML = 'Please enter a valid email.';
		mainDiv.classList.add("has-error");
		}
}

function validateFirstLast(minLength, inputId, feedback, group)
{
	var el = document.getElementById(inputId);
	var elMsg = document.getElementById(feedback);
	var mainDiv=document.getElementById(group); 
	var validRegex = /^[a-zA-Z'-]{2,}$/;

	
	if (el.value.match(validRegex)){
		elMsg.innerHTML = '';
		mainDiv.classList.remove("has-error")
	}
	else
	{
		elMsg.innerHTML = inputId.toUpperCase() + ' must be '+minLength+' characters or more. No symbols or numbers';
		mainDiv.classList.add("has-error");
	}
}

function validatePhone(phone,feedback, group)
{
	var elPhone = document.getElementById(phone);
	var elMsg = document.getElementById(feedback);
	var mainDiv=document.getElementById(group); 
	var validRegex = /^\d{10}$/;
	
	if(elPhone.value.match(validRegex))
		{
			elMsg.innerHTML = '';
			mainDiv.classList.remove("has-error")
		}
	else
		{
		elMsg.innerHTML = 'Please enter a valid phone number. Do not use any symbols or characters.';
		mainDiv.classList.add("has-error");
		}
}

function validateComment(comment,feedback, group)
	{
	var elComment = document.getElementById(comment);
	var elMsg = document.getElementById(feedback);
	var mainDiv=document.getElementById(group); 
	var validRegex = /.+/;

	if(elComment.value.match(validRegex))
	{
		elMsg.innerHTML = '';
		mainDiv.classList.remove("has-error")
	}
	else
	{
		elMsg.innerHTML = 'Please enter a comment.';
		mainDiv.classList.add("has-error");
	}
}

elFirstname.addEventListener('blur', function() {
	validateFirstLast(2, 'firstname', 'fnFeedback', 'firstname-group');
	},false);

elLastname.addEventListener('blur',function() {
	validateFirstLast(2, 'lastname', 'lnFeedback', 'lastname-group')
},false);

elEmail.addEventListener('blur',function() {
	validateEmail('email', 'emFeedback', 'email-group');
},false);

elPhone.addEventListener('blur',function() {
	validatePhone('phone', 'pFeedback', 'phone-group')
},false);

elUsername.addEventListener('blur', function() {
	validateUserPass(6, 'username', 'unFeedback', 'username-group');
	},false);

elPassword.addEventListener('blur', function() {
	validateUserPass(6, 'password', 'pwFeedback', 'password-group');
	},false);

elComment.addEventListener('blur',function() {
	validateComment('comment','cFeedback', 'comment-group')
},false);					 

