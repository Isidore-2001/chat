 
 
 
 pswrdField = document.querySelector(".form input[type='password']");
toggleIcon = document.querySelector(".form .field i");

console.log(pswrdField);
toggleIcon.onclick = () => {
    if (pswrdField.type === "password"){
        pswrdField.type = "text";
       
    }
    else{
        
            pswrdField.type = "password";
            
       
    }
}