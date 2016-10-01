<?php
class ConexaoSabium extends PDO {
 
    private static $instancia;
    private static $host        = '10.0.32.200'; //10.0.181.130
    private static $banco       = 'rdnet';
    private static $usuario     = 'admin'; //postgres
    private static $senha       = 'admin!@#'; //pst3811
    
 
    public function ConexaoSabium($dsn, $username = "", $password = "") {
        
        parent::__construct($dsn, $username, $password, array(PDO::PGSQL_ATTR_DISABLE_NATIVE_PREPARED_STATEMENT => true,PDO::ATTR_EMULATE_PREPARES => true));
    }

    /**
     * @return PDO Returns true on success or false on failure.
     */
    public static function getInstance() {
        
        if(!isset( self::$instancia )){
            try {
                self::$instancia = new ConexaoSabium("pgsql:host=".self::$host.";port=6432;dbname=".self::$banco."", self::$usuario, self::$senha, array(PDO::PGSQL_ATTR_DISABLE_NATIVE_PREPARED_STATEMENT => true,PDO::ATTR_EMULATE_PREPARES => true));
            } catch ( Exception $e ) {

                throw new PDOException('Erro ao conectar');
            }
        }
        print_r(self::$instancia);
        return self::$instancia;
    }
    
    
}
?>