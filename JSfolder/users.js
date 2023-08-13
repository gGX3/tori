const searchBar = document.querySelector(".users .search input"),
      searchBtn = document.querySelector(".users .search button"),
	  userList = document.querySelector(".users .users-list");


	  
 searchBtn.onclick = ()=>{
	 searchBar.classList.toggle("active");
	 searchBar.focus();
	 searchBtn.classList.toggle("active");
	 searchBar.value = "";
 }
 
 searchBar.onkeyup = ()=>{
	 let searchTerm = searchBar.value
	 //ito yung code para mapigilan sa pagtago yung DataOfUsers
	 if(searchTerm != " "){
		 searchBar.classList.add("active");
		
	 }else{
		 searchBar.classList.remove("active");
		 
	 }
	 //---hakdog---
	

	 let xhr = new XMLHttpRequest();
		 xhr.open("POST", "../php/search.php", true);
		 xhr.onload = ()=>{
			 if(xhr.readyState === XMLHttpRequest.DONE){
				 if(xhr.status === 200){
					 let data = xhr.response;
					 userList.innerHTML = data;
			     }
			 }
		 }
		 xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		 xhr.send("searchTerm=" + searchTerm); //sesend sa users.php 
 }
 
 setInterval(()=>{
	 let xhr = new XMLHttpRequest();
		 xhr.open("GET", "../php/users.php", true);
		 xhr.onload = ()=>{
			 if(xhr.readyState === XMLHttpRequest.DONE){
				 if(xhr.status === 200){
					 let data = xhr.response;
					 if(!searchBar.classList.contains("active")){//condition para di magtago ang DataOfUsers
					 userList.innerHTML = data;
					 }
				 }
			 }
		 }
		 xhr.send(); //sesend sa users.php 
 },500);
 