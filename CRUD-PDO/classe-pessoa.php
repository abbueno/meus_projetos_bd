<?php

Class Pessoa{

    private $pdo;

    //CONEXÃO COM O BD
    public function __construct($dbname, $host, $user, $senha)
    {
        try 
        {
            $this->pdo = new PDO("mysql:dbname=".$dbname.";host=".$host,$user,$senha);
        }
        catch (PDOException $e) {
            echo "Erro com banco de dados ".$e->getMessage();
            exit();
        }
        catch (Exception $e) {
            echo "Erro generico: " .$e->getMessage();
            exit();
        }
    }
        //FUNÇÃO PARA BUSCAR DADOS LADO DIREITO DA TELA
        public function buscarDados()
        {
            $res = array();
            $cmd = $this->pdo->query("SELECT * FROM pessoa ORDER BY nome");
            $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
            return $res;
        }    

        // FUNÇÃO DE CADASTRAR PESSOAS
        public function cadastrarPessoa($nome,$telefone,$email)
        {   //Antes de cadastrar, verificar se já tem o email cadastrado
            $cmd = $this->pdo->prepare("SELECT id from pessoa WHERE email = :e");
            $cmd-> bindValue(":e",$email);
            $cmd->execute();
            if($cmd->rowCount() > 0) //email já existe no banco
            {
                return false;
            } else // não foi encontrado o email
            {
                $cmd = $this->pdo->prepare("INSERT INTO pessoa (nome, telefone, email) VALUES (:n, :t, :e)");
                $cmd-> bindValue(":n",$nome);
                $cmd-> bindValue(":t",$telefone);
                $cmd-> bindValue(":e",$email);
                $cmd->execute();
            }

        }
}

    ?>