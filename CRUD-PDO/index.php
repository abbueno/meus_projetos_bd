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
    <?php
    if(isset($_POST['nome']))
    {
        $nome = addslashes($_POST['nome']);
        $telefone = addslashes($_POST['telefone']);
        $email = addslashes($_POST['email']);
        if (!empty($nome) && !empty($telefone) && !empty($email))
        {
            if(!$p->cadastrarPessoa($nome, $telefone, $email))
            {
                echo "Email já está cadastrado!";
            }
        }
        else
        {
            echo "Preencha todos os campos";
        }
    }

    ?>


    <section id="esquerda">
        <form action="">
            <h2>CADASTRAR PESSOA</h2>
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome">
            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" id="telefone">
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
            <input type="submit" value="Cadastrar">            
        </form>
    </section>
    <section id="direita">
    <table>
            <tr id="titulo">
                <td>NOME</td>
                <td>TELEFONE</td>
                <td colspan="2">EMAIL</td>
            </tr>
        <?php
            $dados = $p-> buscarDados();
            if(count($dados) > 0)
            {
                for ($i=0; $i < count($dados) ; $i++) {
                    echo "<tr>";
                    foreach ($dados[$i] as $k => $v) {
                        if ($k != "id")
                        {
                            echo "<td>".$v."</td>";
                        }
                    }
                    ?>
                    <td><a href="">Editar</a> <a href="">Excluir</a></td>
                    <?php
                    echo "</tr>";                    
                }        
            }
            else
            {
                echo "Ainda não há pessoas cadastradas!";
            }            
        ?>                    
        </table>
    </section>
</body>
</html>