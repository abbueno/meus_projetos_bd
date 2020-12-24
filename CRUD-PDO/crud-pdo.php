<?php
// CONEXÃO COM O BDO
try
{
    $pdo = new PDO("mysql:dbname=crudpdo;host=localhost", "root", "");
}
catch (PDOException $e) {
    echo "Erro com banco de dados: ".$e->getMessage();;
}
catch(Exception $e)
{
    echo "Erro genérico: ".$e->getMessage();
}

// INSERÇÃO DE DADOS

$res = $pdo->prepare("INSERT INTO pessoa(nome, telefone, email) VALUES (:n, :t, :e)");
$res->bindValue(":n","Allan");
$res->bindValue(":t","00000000000");
$res->bindValue(":e","meuemail@gmail.com");
$res->execute();

/* 2ª forma
$res = $pdo->query("INSERT INTO pessoa(nome, telefone, email) VALUES('Allan2','00000000000','meuemail2@gmail.com')");
*/


// DELETE E UPDATE

$cmd = $pdo->prepare("DELETE FROM pessoa WHERE id = :id");
$id = 4;
$cmd->bindValue(":id",$id);
$cmd->execute();

/* 2ª forma
$cmd = $pdo->query("DELETE FROM pessoa WHERE id = '2'");
*/

$cmd = $pdo->prepare("UPDATE pessoa SET email = :e  WHERE id = :id");
$cmd->bindValue(":e","meuemail2222@gmail.com");
$cmd->bindValue(":id",1);
$cmd->execute();

/*
$cmd = $pdo->query("UPDATE pessoa SET email = 'meuemail@gmail.com' WHERE id = '1'");
*/


?>