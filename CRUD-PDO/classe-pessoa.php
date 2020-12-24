<?php

private $pdo;
//CONEXÃO COM O BD
public function __construct($dbname, $host, $user, $senha)
{
    try 
	{
        $this-> new PDO("mysql:dbname=".$dbname.";host=".$host,$user,$senha);
    }
    catch (PDOException $e) {
        echo "Erro com banco de dados ".$e->getMessage();
        exit();
    }
    catch (Exception $e) {
        echo "Erro generico: " .$e->getMessage();
        exit();
    }

    //FUNÇÃO PARA BUSCAR DADOS LADO DIREITO DA TELA
    public function buscarDados()
    {
        $res = array();
        $cmd = this->pdo->query("SELECT * FROM pessoa ORDER BY nome");
        $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

}






?>