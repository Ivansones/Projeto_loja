<?php
$conectar = mysql_connect('localhost','root','');
$banco = mysql_select_db('loja');

if (isset($_POST['gravar']))
{
    $codigo       = $_POST['codigo'];
    $descricao    = $_POST['descricao'];
    $cor          = $_POST['cor'];
    $tamanho      = $_POST['tamanho'];
    $preco        = $_POST['preco'];
    $codmarca     = $_POST['codmarca'];
    $codcategoria = $_POST['codcategoria'];
    $codtipo      = $_POST['codtipo'];
    $foto1        = $_FILES['foto1'];
    $foto2        = $_FILES['foto2'];

    $diretorio = "imagens/";

    $extensao1 = strtolower(substr($_FILES['foto1']['name'], -4));
    $novo_nome1 = md5(time().$extensao1);
    move_uploaded_file($_FILES['foto1']['tmp_name'], $diretorio.$novo_nome1 );

    $extensao2 = strtolower(substr($_FILES['foto2']['name'], -6));
    $novo_nome2 = md5(time().$extensao2);
    move_uploaded_file($_FILES['foto2']['tmp_name'], $diretorio.$novo_nome2 );

    $sql = "insert into produto(codigo,descricao,cor,tamanho,preco,codmarca,codcategoria,codtipo,foto1,foto2)
            values ('$codigo','$descricao','$cor','$tamanho','$preco','$codmarca','$codcategoria','$codtipo','$novo_nome1','$novo_nome2')";

    $resultado = mysql_query($sql);

    if ($resultado)
    {
        echo "Foi cadastrado com sucesso";
    }
    else 
    {
        echo "Aconteceu um erro";
    }
}
if (isset($_POST['alterar']))
{
    $codigo       = $_POST['codigo'];
    $descricao    = $_POST['descricao'];
    $cor          = $_POST['cor'];
    $tamanho      = $_POST['tamanho'];
    $preco        = $_POST['preco'];
    $codmarca     = $_POST['codmarca'];
    $codcategoria = $_POST['codcategoria'];
    $codtipo      = $_POST['codtipo'];
    $foto1        = $_FILES['foto1'];
    $foto2        = $_FILES['foto2'];

    $sql = "update produto set preco = '$preco'
            where codigo = '$codigo'";

    $resultado = mysql_query($sql);

    if ($resultado == TRUE){
        echo "Produto alterado com sucesso";
    }
    else {
        echo "Houve um erro ao alterar os dados";
    }

}

if (isset($_POST['remover']))
{
    $codigo       = $_POST['codigo'];
    $descricao    = $_POST['descricao'];
    $cor          = $_POST['cor'];
    $tamanho      = $_POST['tamanho'];
    $preco        = $_POST['preco'];
    $codmarca     = $_POST['codmarca'];
    $codcategoria = $_POST['codcategoria'];
    $codtipo      = $_POST['codtipo'];
    $foto1        = $_FILES['foto1'];
    $foto2        = $_FILES['foto2'];
    

    $sql = " delete from produto
            where codigo ='$codigo'";

    $resultado = mysql_query($sql);

    if ($resultado ==TRUE)
    {
        echo "Dados deletados com sucesso";
    }
    else 
    {
        echo "Houve um erro ao deletar dados";
    }
}

if (isset($_POST['pesquisar'])){

    $codigo       = $_POST['codigo'];
    $descricao    = $_POST['descricao'];
    $cor          = $_POST['cor'];
    $tamanho      = $_POST['tamanho'];
    $preco        = $_POST['preco'];
    $codmarca     = $_POST['codmarca'];
    $codcategoria = $_POST['codcategoria'];
    $codtipo      = $_POST['codtipo'];
    $foto1        = $_FILES['foto1'];
    $foto2        = $_FILES['foto2'];

    $diretorio = "imagens/";

    $sql = "select * from produto";

    $resultado = mysql_query($sql);
    if (mysql_num_rows($resultado)==0){
        echo "Não teve nada";
    }
    else {
        echo "<b>"."Esse são os resultados "."</b> <br>";
        while ($dados = mysql_fetch_array($resultado))
        {
            echo "codigo     :".$dados['codigo']."<br>".
                 "descricao  :".$dados['descricao']."<br>".
                 "cor        :".$dados['cor']."<br>".
                 "tamanho    :".$dados['tamanho']."<br>".
                 "preco      :".$dados['preco']."<br>".
                 '<img src="imagens/'.$dados['foto1'].'" height="100" width="150" />'."<br><br>";
                 '<img src="imagens/'.$dados['foto2'].'" height="100" width="150" />'."<br><br>";


        }
    }
}
?>