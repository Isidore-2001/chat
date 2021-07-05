<?php
  require("ParmsException.class.php");
 
  /**
  *  prend en compte le paramètre $name 
  *   qui doit représenter 
  *  @return : valeur retenue, convertie en int.
  *   - si le paramètre est absent ou vide, renvoie  $defaultValue
  *   - si le paramètre est incorrect, déclenche une exception ParmsException
  *
  */
  function checkUnsignedString(?string $name =NULL) : ?string {
    
    /* à compléter */
    
    
    
   if (!isset($name) || trim($name) === "" || $name === NULL){
       throw new parmsException($e);
     }
     else{
         return trim($name);
     }
   
 

//catch(ParmsException $e){
    //require('views/pageErreur.html');

//}
}
  
  /**
  *  prend en compte le paramètre $name 
  *   qui doit représenter une chaîne
  *  @return : valeur retenue
  *   - si le paramètre est absent ou vide, renvoie  $defaultValue
  *   - si le paramètre est incorrect, déclenche une exception ParmsException
  *
  */
 function checkString(string $name, ?string $defaultValue=NULL, bool $mandatory = TRUE) : ?string {
     if ( ! isset($_REQUEST[$name]) || $_REQUEST[$name]==="" ){
      if ($defaultValue !== NULL)
        return $defaultValue;
      else if ($mandatory)
        throw new ParmsException("$name absent");
      else
        return NULL;
     }
     $val = $_REQUEST[$name];
     return $val;
  }
     
 ?>