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
  $("#back").hide();
   
  
  $(document).ready(function(){
	  $("#bBtn").click(function(){
		  $("#bogart").show();
		  userss.classList.add("show");
		  usersearch.classList.add("show");
           $("#back").show();
		   $("#bBtn").hide();
		   alert("Your now talking to Bogart");
		  
	  });
	  
	  
	  
	  $("#back").click(function(){
		  $("#bBtn").show();
		  $("#bogart").hide();
		  userss.classList.remove("show");
		  usersearch.classList.remove("show");
		   $("#bogart").hide();
           $("#back").hide();
		   $("#bBtn").show();
		  alert("Bogart will now go back hevean");
	  });
	  
	  
  });