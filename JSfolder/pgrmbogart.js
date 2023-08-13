 $(document).ready(function(){
		  $("#send-btn").on("click", function(){
			 $value = $("#data").val();
			 if($value.length == 0){
				 
			 }else{
             $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
             $(".form").append($msg);	
			 $("#data").val('');
             
             //ajax code na dito 

             $.ajax({
				url: '../php/labyuBogart.php',
                type: 'POST',
                data: 'text='+$value,
                success: function(result){
					$reply = '<div class="bot-inbox inbox"><img src="../images/bogart.jpg" alt=""><div class="msg-header"><p>'+ result +'</p></div></div>';
					$(".form").append($reply);	
					$(".form").scrollTop($(".form")[0].scrollHeight);
				}				
			 });
			 }			 
		  });
	   });
	   
	   
  const userss = document.querySelector(".users ");
  const usersearch = document.querySelector(".users .search");

  
	   
  $("#bogart").hide();
  $(".back").hide();
  $(".menu-cp").hide();
  
   
  
  $(document).ready(function(){
	  $(".bBtn").click(function(){
		  $("#bogart").show();
		  userss.classList.add("show");
		  usersearch.classList.add("show");
           $(".back").show();
		   $(".bBtn").hide();
		   $(".users").hide();
		   alert("Your now talking to Bogart");
		  
	  });
	  
	  
	  
	  $(".back").click(function(){
		  $(".bBtn").show();
		  $("#bogart").hide();
		  userss.classList.remove("show");
		  usersearch.classList.remove("show");
		   $(".back").hide();
		   $("#bogart").hide();
		   $(".bBtn").show();
		   $(".users").show();
		   $(".userscon").show();
		  alert("Bogart will now go back hevean");
	  });
	  
	  //cp version
	  $(".back-cp").click(function(){
		  $(".menu-cp").hide();
		  $(".userscon").show();
		  $(".users").show();
		  $("#bogart").hide();
	  });
	  
	  $(".bBtn-cp").click(function(){
		  $(".menu-cp").hide();
		  $(".userscon").show();
		  $(".users").hide();
		  $("#bogart").show();
	  });
	 
	
	   //dito yung code for humburger menu 
	   
	  $(".menu-hamburger").click(function(){
		  $(".userscon").hide();
		  $(".menu-cp").show();
		 
	  });
	  
  });

  
  
 
  
  