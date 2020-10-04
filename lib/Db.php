<?php
class Db{
    /* @var $pdo_connection PDO */
    private static $pdo_connection;

    /**
     * Realiza uma query no databse e retorna um array contendo todas as linhas do conjunto de resultados
     * @param $sql string da query a ser ececutada
     * @return array Retorna um array contendo todas as linhas do conjunto de resultados
     */
    public static function query($sql)
    {
        $pst=self::$pdo_connection->prepare($sql);
        $success = $pst->execute();
        if (!$success) {
            echo "<br /><br />Erro na query: $sql<br /><br />";
            print_r($pst->errorInfo());
        }
        return $pst->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Realiza uma query no databse e retorna true/false em caso de sucesso/falha
     * @param $sql string da query a ser ececutada
     * @param $params opcional array de params para ser "formatado" na query $sql
     * @return bool true/false em caso de sucesso/falha
     */
    public static function execute($sql,$params=null)
    {
        $pst=self::$pdo_connection->prepare($sql);
        if ($params)
            foreach($params as $param=>$value){
                $tipo=$value[0];
                $valor = $value[1];
                $pst->bindParam($param,$valor,$tipo);
            }
        $success = $pst->execute();
        if (!$success) {
            echo "<br /><br />Erro na query: $sql<br /><br />";
            print_r($pst->errorInfo());
        }
        return $success;
    }

    /**
     *  Restorna o ultimo is inserido
     * @return string id do ultimo dado inserido
     */
    public static function getLastId()
    {
        return self::$pdo_connection->lastInsertId();
    }

    /**
     *  Abre a conexão com o DB
     * @param $base string nome do database
     * @param $user string usuario do banco de dados
     * @param $pass string senha do usuario do banco de dados
     * @param $host string endereço do banco de dados
     */
    public static function connect_on_db($base, $user, $pass, $host)
    {
        self::$pdo_connection = null;
        $pdo_detail = 'mysql:host=' . $host . ';dbname='. $base;
        try {
            self::$pdo_connection = new PDO(
                $pdo_detail,$user,$pass);
            self::$pdo_connection->exec("set names utf8");
        } catch (PDOException $e) {
            print "Erro: " . $e->getMessage() . "<br>";
            die();
        }
    }



}