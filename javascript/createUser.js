

window.addEventListener('load',initForm);

function initForm(){
  
  document.forms.formulaire.addEventListener("submit", sendForm);
  //document.forms.form_communes.addEventListener("submit", fetchCommune);

  

}
  
  

function sendForm(ev){ // form event listener
    ev.preventDefault();
    let args=new FormData(this);
    fetchFromJson('services/createUser.php',{method:'post',body:args})
    .then(makemessagesItems);

      }
	     // clear list
		//message.textContent = 'waiting...';
	

 


//liste=document.getElementById('liste_communes');
//message=document.getElementById('message');


function makemessagesItems(answer){
  liste=document.getElementById('message');
  liste.textContent = '';
  errorText = document.querySelector(".error-text");
  
  let option1 = document.createElement('li');
  if (answer.status == "ok"){
    location.href="users.php";}
  else
     {
        errorText.style.display = "block";
        errorText.textContent = answer.message;
      
    }
  

  

  
}
