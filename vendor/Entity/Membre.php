<?php
namespace Entity;
class Membre{
    
    public $id_membre;
    public $pseudo;
    protected $mdp;
    public $nom;
    public $prenom;
    public $email;
    public $sexe;
    public $ville;
    public $cp;
    public $adresse;
    public $statut;
    
//:::::::::::::GETTERS::::::::::::::

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }
    
//:::::::::::::SETTERS:::::::::::::::
    
     public function setIdMembre($id_membre){
       
        return $this->id_membre = $id_membre; 
    }
    
     public function setPseudo($pseudo){
       
        return $this->pseudo = $pseudo; 
    }
    
    public function setMdp($mdp){
       
        return $this->mdp = $mdp; 
    }
    
     public function setNom($nom){
       
        return $this->nom = $nom; 
    }
    
    public function setPrenom($prenom){
       
        return $this->prenom = $prenom; 
    }
    
     public function setEmail($email){
       
        return $this->email = $email; 
    }
    
    public function setSexe($sexe){
       
        return $this->sexe = $sexe; 
    }
    
     public function setVille($ville){
       
        return $this->ville = $ville; 
    }
    
    public function setCp($cp){
       
        return $this->cp = $cp; 
    }
    
     public function setAdresse($adresse){
       
        return $this->adresse = $adresse; 
    }
    
    public function setStatut($statut){
       
        return $this->statut = $statut; 
    }
    
//:::::::::::::GETTERS::::::::::::
    
      public function getIdMembre(){
       
        return $this->id_membre; 
    }
    
    public function getPseudo(){
        return $this->pseudo;
    }
    
    public function getEmail(){
        return $this->email;
    }


}

