window.addEventListener('load',initForm);

function initForm(){
  
  document.forms.formulaire.addEventListener("submit", sendForm1);
  //document.forms.form_communes.addEventListener("submit", fetchCommune);

  

}



function sendForm20(ev){ // form event listener
    ev.preventDefault();
    fetchFromJson('services/logout.php')
    .then(choix);

  

    
          }

function choix(answer){
        
        let errorText = document.querySelector(".error-text");
        
        let option1 = document.createElement('li');
        console.log(answer.status);
        if (answer.status == "ok"){
          location.href="users.php";}
        else
           {
              errorText.style.display = "block";
              errorText.textContent = answer.message;
            
          }}