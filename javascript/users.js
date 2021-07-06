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
    timer2();
    ev.preventDefault();
    window.setInterval(timer2,500);
    
    
    
    
    }
function timer (){
    /*fetchFromJson('services/user.php')
    .then(makemessagesItems3);
    */
}

function timer2 (){
    fetchFromJson('services/search.php?search='+s.value)
    .then(makemessagesItems3);
    
}



    function makemessagesItems3(answer){
        console.log(answer);
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