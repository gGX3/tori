const form = document.querySelector(".signup form"),
      continueBtn = form.querySelector(".button input"),
	  errorText = form.querySelector(".error-txt");

	  
	  form.onsubmit = (e)=>{
		  e.preventDefault();
	  }
	  
	   continueBtn.onclick = ()=>{
		 let xhr = new XMLHttpRequest();
		 xhr.open("POST", "../php/Signup.php", true);
		 xhr.onload = ()=>{
			 if(xhr.readyState === XMLHttpRequest.DONE){
				 if(xhr.status === 200){
					 let data = xhr.response;
					 if(data !== "b"){
						errorText.textContent = data;
						errorText.style.display = "block";
					 }else{
						 location.href = "verifyArea.php";
						 
					 }
				 }
			 }
		 }
		 let formData = new FormData(form);
		 xhr.send(formData);
	  }