<?php
namespace Entity;

class Avis{
     protected $id_avis;
     protected $commentaire;
     protected $note;
     protected $date;
     protected $id_salle;
     protected $id_membre;
     
     public function getIdAvis(){
         return $this->id_avis;
     }
     
     public function getCommentaire(){
         return $this->commentaire;
     }
     
     public function getNote(){
         return $this->note;
     }
     
     public function getDate(){
         return $this->date;
     }
     
     public function getIdSalle(){
         return $this->id_salle;
     }
     
     public function getIdMembre(){
         return $this->id_membre;
     }
}
