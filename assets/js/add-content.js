
// JavaScript Document
var today = new Date();
var hourNow = today.getHours();
var greeting;
var e1=document.getElementById("greeting");

if (hourNow > 18){
	greeting = 'Good evening!';
	}
else if (hourNow > 12){
	greeting = 'Good afternoon!';
}
else if (hourNow> 0){
	greeting = 'Good morning!';
}
else{
	greeting = 'Welcome!';
}
e1.innerHTML='<h3>'+greeting+'</h3>';