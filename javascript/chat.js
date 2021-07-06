
window.addEventListener('load',initForm);
/*window.addEventListener("DOMContentLoaded", (event) => {
  sendForm2;
});*/
const form = document.querySelector(".typing-area");
sendBtn = form.querySelector("button");

inputField = form.querySelector(".input-field");
chatBox = document.querySelector(".chat-box");

function initForm(){
  
  /**window.setInterval(,500);**/
  sendForm2();
  form.addEventListener("submit", sendForm1);
  

  
  //document.forms.form_communes.addEventListener("submit", fetchCommune);
  
  

}

inputField.focus();
inputField.onkeyup = ()=>{
    if(inputField.value != ""){
      scrollToBottom(); 

        sendBtn.classList.add("active");
    }else{
        sendBtn.classList.remove("active");
    }
}


function sendForm1(ev){ // form event listener
    
    ev.preventDefault();
    let args= new FormData(this);
    fetchFromJson('services/chat-insert.php',{method:'post',body:args})
    .then(makemessagesItems);
    
    
    }
    function sendForm2(){ // form event listener
      window.setInterval(()=>{
      
        
        fetchFromJson('services/get-chat.php')
       .then(makemessagesItems2);
      }, 500);
      
      }
    


    function makemessagesItems(answer){
        let errorText = document.querySelector(".error-text");
        
        let option1 = document.createElement('li');
        console.log(answer.status);
        if (answer.status == "ok"){
          location.href="#";}
        else
           {
              errorText.style.display = "block";
              errorText.textContent = answer.message;
            
          }
        
      }

      chatBox.onmouseenter = ()=>{
        chatBox.classList.add("a");
    }
    
    chatBox.onmouseleave = ()=>{
        chatBox.classList.remove("a");
    }
      function makemessagesItems2(answer){
        
        let Text = document.querySelector(".chat-box");
        
        let option1 = document.createElement('li');
        console.log(answer.status);
        if (answer.status == "ok"){
          
          Text.innerHTML = answer.result;
        
          if(!chatBox.classList.contains("a")){
            scrollToBottom();          }
         
        }
        else
           {
              errorText.style.display = "block";
              errorText.textContent = answer.message;
            
          }
      }

      function scrollToBottom(){
        chatBox.scrollTop = chatBox.scrollHeight;
      }
      

      

      