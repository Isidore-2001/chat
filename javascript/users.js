const s = document.querySelector(".search input");
const b = document.querySelector(".search button");
window.addEventListener('load',sendForm3);


b.onclick = ()=>{
    s.classList.toggle("show");
    b.classList.toggle("active");
    if (s.classList.contains("active")){
        s.classList.value = "";
        s.classList.remove("active");
    }
   
}



s.onkeyup = () =>{
let t = s.classList.value;
if (t != ""){
    s.classList.add("active");

}
else{
    s.classList.remove("active");
}

}

function sendForm3(ev){ // form event listener
    
    ev.preventDefault();
    window.setInterval(timer,500);
    
    
    
    
    }
function timer (){
    fetchFromJson('services/user.php')
    .then(makemessagesItems3);
    
}



    function makemessagesItems3(answer){
        
        let Text = document.querySelector(".users-list");
        
        let option1 = document.createElement('li');
        console.log(answer.status);
        if (answer.status == "ok"){
          Text.innerHTML = answer.result;}
        else
           {
              errorText.style.display = "block";
              errorText.textContent = answer.message;
            
          }
        
      
        
      
        
      }