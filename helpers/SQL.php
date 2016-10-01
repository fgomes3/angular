<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SQL
 *
 * @author Usuario
 */
class SQL {

    public static function getArray($sql, PDO $Conexao){
        $stmt = $Conexao->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public static function getInputArray($sql, PDO $Conexao){

        $stmt = $Conexao->prepare($sql);

        $stmt->execute();

        $array = array();

        while($linha = $stmt->fetch(PDO::FETCH_NUM)){
            $array[] = $linha[0];
        }

        return $array;

    }

    public static function getOneArray($sql, PDO $Conexao){

        $stmt = $Conexao->prepare($sql);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);

    }

}
?>
