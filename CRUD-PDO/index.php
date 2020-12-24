<?php
require_once 'classe-pessoa.php';
$p = new Pessoa("crudpdo","localhost","root","");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Pessoa</title>
    <link rel="stylesheet" href="estilo.css"></a>
</head>
<body>
    <section id="esquerda">
        <form action="">
            <h2>CADASTRAR PESSOA</h2>
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome">
            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" id="telefone">
            <label for="email">Email</label>
            <input type="text" name="email" id="email">
            <input type="submit" value="Cadastrar">            
        </form>
    </section>
        <section id="direita">
        <?php
            $dados = $p-> buscarDados();
            if(count($dados) > 0)
            {
                for ($i; $i < ; $i++) {
                    foreach ($dados[$i] as $k => $v) {
                        
                    }
                }
            }
        ?>
        <table>
            <tr id="titulo">
                <td>NOME</td>
                <td>TELEFONE</td>
                <td colspan="2">EMAIL</td>
            </tr>
            <tr>
                <td>maria</td>
                <td>289999999</td>
                <td>email@gmail.com</td>
                <td><a href="">Editar</a> <a href="">Excluir</a></td>
            </tr>
        
        </table>

    </section>

</body>
</html>