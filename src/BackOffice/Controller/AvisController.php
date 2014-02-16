<?php
namespace Backoffice\Controller;
USE Controller\Controller;

class AvisController extends Controller{
    public function findBySalle($id){
        $query = $this->getRepository('Avis');
        $result = $query->findBySalleId($id);
        return $result;
    }
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

