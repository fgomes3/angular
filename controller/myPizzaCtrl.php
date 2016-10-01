<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');

class myPizzaCtrl {
    
    public function listAll(){
        
        $db = ConexaoSabium::getInstance();
        
        $query = 'select c.nome, c.cpf, c.cargo from gazin.admin_pessoal_cracha c limit 10';
        
        $stmt = $db->prepare($query);
        
        $stmt->execute();
        
        echo json_encode($stmt->fetchAll(\PDO::FETCH_ASSOC));
        
    }
    
}