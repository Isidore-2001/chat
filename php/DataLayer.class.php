<?php

class DataLayer {
	// private ?PDO $conn = NULL; // le typage des attributs est valide uniquement pour PHP>=7.4

	private  $connexion = NULL; // connexion de type PDO   compat PHP<=7.3
	
	/**
	 * @param $DSNFileName : file containing DSN 
	 */
	function __construct(string $DSNFileName){
		$dsn = "uri:$DSNFileName";
		$this->connexion = new PDO($dsn);
		// paramètres de fonctionnement de PDO :
		$this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // déclenchement d'exception en cas d'erreur
		$this->connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC); // fetch renvoie une table associative
        // réglage d'un schéma par défaut :
        $this->connexion->query('set search_path=tchat');
		
    }
    
    function createUser(string $login, string $password, string $nom, string $prenom, string $image, 
    string $email) : bool	 {
        $sql = <<<EOD
        insert into "users" (nom, prenom, login, password, email, image, status)
        values (:nom, :prenom, :login, :password, :email, :image, :status)
EOD;
        
        try{
            
            $stmt = $this->connexion->prepare($sql);
            $stmt->bindValue(":login", $login);
            $stmt->bindValue(":password",$password);
            $stmt->bindValue(":nom", $nom);
            $stmt->bindValue(":prenom", $prenom);
            $stmt->bindValue(":image", $image);
            $stmt->bindValue(":email", $email);
            $stmt->bindValue(":status", 'ok');

            $stmt->execute();
            return TRUE;
            }
            catch (PDOException $e){
                var_dump($e);
                return false;
            }
        }



        function login(string $email, string $password) : ?array{ // version password hash
            // à compléter
            $res = <<<EOD
            select * from "users" 
            where email=:email 
            
        EOD;
        
        $stmt = $this->connexion->prepare($res);
        
        $stmt->bindValue(":email",$email);
        //$stmt->bindValue(":nom",$nom);
        //$stmt->bindValue(":password",$password);
        $stmt->execute();
        //$stmt->setFetchMode(PDO::FETCH_ASSOC);
        $res1 = $stmt->fetch();
        $count = $stmt->fetchColumn();
        
        if($res1['email'] === $email && $res1['password'] === $password ){
            $res =  ["login"=>$res1['login'], "nom"=>$res1['nom'], "prenom"=>$res1['prenom'] , "email" =>$res1['email']];}
        else{
            $res = NULL;
        }
        return $res;
            
        }


        function info(string $email) : ?array{ // version password hash
            // à compléter
            $res = <<<EOD
            select * from "users" 
            where email=:email 
            
        EOD;
        
        $stmt = $this->connexion->prepare($res);
        
        $stmt->bindValue(":email",$email);
        //$stmt->bindValue(":nom",$nom);
        //$stmt->bindValue(":password",$password);
        $stmt->execute();
        //$stmt->setFetchMode(PDO::FETCH_ASSOC);
        $res1 = $stmt->fetch();
        $count = $stmt->fetchColumn();
        
        if($res1['email'] === $email){
            $res =  ["numUsers" => $res1['numusers'], "login"=>$res1['login'], "nom"=>$res1['nom'], "prenom"=>$res1['prenom'] , "email" =>$res1['email'], "image"=>$res1['image'], "status"=>$res1['status']];}
        
        return $res;
            
        }
        function info1(int $num_id) : ?array{ // version password hash
            // à compléter
            $res = <<<EOD
            select * from "users" 
            where numusers=:numusers 
            
        EOD;
        
        $stmt = $this->connexion->prepare($res);
        
        $stmt->bindValue(":numusers",$num_id);
        //$stmt->bindValue(":nom",$nom);
        //$stmt->bindValue(":password",$password);
        $stmt->execute();
        //$stmt->setFetchMode(PDO::FETCH_ASSOC);
        $res1 = $stmt->fetch();
        $count = $stmt->fetchColumn();
        
        if($res1['numusers'] === $num_id){
            $res2 =  ["numUsers" => $res1['numusers'], "login"=>$res1['login'], "nom"=>$res1['nom'], "prenom"=>$res1['prenom'] , "email" =>$res1['email'], "image"=>$res1['image'], "status"=>$res1['status']];}
        
        return $res2;
            
        }

        function updatestatus(string $email,string $status) : ?bool{ // version password hash
            // à compléter
            $res = <<<EOD
            update "users" set status=:status 
            where email=:email 
            
        EOD;
        
        $stmt = $this->connexion->prepare($res);
        
        $stmt->bindValue(":email",$email);
        
        $stmt->bindValue(":status",$status);
        //$stmt->bindValue(":password",$password);
        $stmt->execute();
        return True;
        }


        function users(string $email, string $i){
            $res = <<<EOD
            select * from "users" 
            where not email=:email and status=:status and ilike nom '%:nom' order by numusers desc
            
        EOD;
        
        $stmt = $this->connexion->prepare($res);
        
        $stmt->bindValue(":email",$email);
        $stmt->bindValue(":nom",$i);
        
        $stmt->bindValue(":status",'Active now');
        //$stmt->bindValue(":password",$password);
       
        $stmt->execute();
        //$stmt->setFetchMode(PDO::FETCH_ASSOC);
        $res1 = $stmt->fetchAll();
        return $res1;
        }


        function chatinsert(string $email1, string $email2, string $message ){
            $res = <<<EOD
            insert into "message" (texte, email1, email2, date_ms)
            values (:texte, :email1, :email2, :date_ms)
            
        EOD;
        try{
        $today = date("H:i:s");  
        $stmt = $this->connexion->prepare($res);
        
        $stmt->bindValue(":email1",$email1);
        $stmt->bindValue(":email2",$email2);
        $stmt->bindValue(":texte",$message);
        $stmt->bindValue(":date_ms",$today);

        
        
        //$stmt->bindValue(":password",$password);
       
        $stmt->execute();
        return TRUE;
            }
            catch (PDOException $e){
                var_dump($e);
                return false;
            }
        }
        function getchat(string $email1,  string $email2){
            $res = <<<EOD
            select * from "message" 
            where email1=:email and email2=:email1 or email1=:email1 and email2=:email order by message_id asc
            
        EOD;
         
        $stmt = $this->connexion->prepare($res);
        
        $stmt->bindValue(":email",$email1);
        $stmt->bindValue(":email1",$email2);
        
        
        
       
        $stmt->execute();
        //$stmt->setFetchMode(PDO::FETCH_ASSOC);
        $res1 = $stmt->fetchAll();
        return $res1;
    }
    function getchat2(string $email1,  string $email2, int $id){
        $res = <<<EOD
        select * from "message" 
        where email1=:email and email2=:email1 or email1=:email1 and email2=:email group by  message_id having message_id >:id
        
    EOD;
     
    $stmt = $this->connexion->prepare($res);
    
    $stmt->bindValue(":email",$email1);
    $stmt->bindValue(":email1",$email2);
    $stmt->bindValue(":id",$id);
    
    
    
   
    $stmt->execute();
    //$stmt->setFetchMode(PDO::FETCH_ASSOC);
    $res1 = $stmt->fetchAll();
    return $res1;
}




}


?>