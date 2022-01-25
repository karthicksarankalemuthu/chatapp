const form = document.querySelector(".typing-area"),
incoming_id = form.querySelector(".incoming_id").value,
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("#button"),
chatBox = document.querySelector(".chat-box");

form.onsubmit = (e)=>{
    e.preventDefault();
}



sendBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "insertchat.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            inputField.value = "";
              scrollToBottom();
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}


setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "getchat.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            chatBox.innerHTML = data;
                scrollToBottom();
              
          }
      }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("incoming_id="+incoming_id);
    
}, 500);

function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
  }
  