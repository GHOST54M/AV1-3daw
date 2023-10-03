    <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
      $id = $_POST['id'];
      $quantidade= $_POST['quantidade'];

    $arqCarrinho = fopen("carrinho.txt","a")or die("Não foi possível criar o arquivo.");
    $arqProduto = fopen("produto.txt","r")or die("Não foi possível acessar o arquivo.");
      $x = 0;
      $sucesso = 0;
    while(!feof($arqProduto)){
        $linha[] = fgets($arqProduto);
        $colunaDados = explode(";", $linha[$x]);
      
        $idp = $colunaDados[0];
        $nome = $colunaDados[1];
        $valor = $colunaDados[2];
          
            If($idp == $id)
              {
              $linha = $id . ";" . $nome . ";" . $quantidade . ";" . $valor;
              fwrite($arqCarrinho,$linha);
              $sucesso = 1;
              break;
            }else{
              $x++;     
            }
            }
      fclose($arqCarrinho);
      fclose($arqProduto);
       }

     ?>
<html>
  <head>
    <title>Adicionar carrinho</title>
  <style>
    .container{
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: 20px;
    }
  </style>
  </head>
  <body>
    <main>
      <section class="container">
    <?php
    if($sucesso == 1)
    {
      echo "Produto adicionado!";
    }
    else{
      echo"Erro ao adicionar produto!";
    }
    ?>
<a href="index.php">Voltar</a>
      </section>
    </main>
  </body>
</html>