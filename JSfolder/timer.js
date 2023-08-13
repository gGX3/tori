const form = document.querySelector(".headerG"),
			 timerText = form.querySelector(".timer");
	  
form.ready(e){
	setInterval(e){
		timerText.load("timer.php");
	},1000);
});