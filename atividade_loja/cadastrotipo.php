<?php
$conectar = mysql_connect('localhost','root','');
$banco = mysql_select_db('loja');

if (isset($_POST['gravar']))
{

$codigo = $_POST['codigo'];
$nome = $_POST['nome'];

$sql = "insert into tipo(codigo,nome)
        values ('$codigo','$nome')";


$resultado = mysql_query($sql);

if ($resultado ==TRUE)
    {
        echo "O tipo foi gravada com sucesso";
    }
else
    {
        echo "Aconteceuu um erro";
    }
}

if (isset($_POST['remover']))
{
    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];

    $sql = "delete from tipo
            where codigo ='$codigo'";

    $resultado = mysql_query($sql);
    if ($resultado ==TRUE)
    {
        echo "Os dados foram excluidos";
    }
    else
    {
        echo "Ocorreu um erro";
    }
}

if (isset($_POST['alterar']))
{
    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];

    $sql = "update tipo set nome ='$nome' 
            where codigo ='$codigo'";

    $resultado = mysql_query($sql);

    if ($resultado ==TRUE)
    {
        echo "Dados alterados com sucesso";

    }
    else
    {
        echo "Erro ao alterar dados";
    }

}

if (isset($_POST['pesquisar']))
    {
        $codigo = $_POST['codigo'];
        $nome = $_POST['nome'];

        $sql = "select * from tipo";

        $resultado = mysql_query($sql);

        if (mysql_num_rows($resultado)==0)
        {
            echo "Algo deu errado na pesquisa";
        }
        else
        {
            echo "<b>"."Esse são os resultados"."</b><br>";
            while ($dados = mysql_fetch_array($resultado))
            {
                echo "Codigo:".$dados['codigo']."<br>".
                     "Nome  :" .$dados['nome']."<br><br>";
                     
            }
        }
    }
?>