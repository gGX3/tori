//eto yung code para ma read ang message sa database
let gchatbox = document.querySelector(".g-chat-box");
setInterval(()=> {
    fetch("../php/GReadmsg.php").then(
        r=>{
            if(r.ok){
                return r.text();
            }
        }
    ).then(
        d=>{
            gchatbox.innerHTML=d;
        }
    )
}, 500);






//eto yung code para yung message mapunta sa database
window.onkeydown=(e)=>{
	
    if(e.key == "Enter"){
        update()
    }
}

function update(){
    let msg = input_msg.value;
    input_msg.value="";
    fetch(`../php/addMsg.php?msg=${msg}`).then(
        r=>{
            if(r.ok){
                return r.text();
            }
        }
    ).then(
        d=>{
			
            gchatbox.scrollTop = (gchatbox.scrollHeight-gchatbox.clientHeight);

        }
    )
}