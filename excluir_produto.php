<html>
  <head>
    <title>Excluir</title>
    <style>

    #formulario, .container{
    display: flex;
    flex-direction: column;
    align-items: center;
    }
    </style>
  </head>
  <body>
    
    <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
  Error_reporting(0);
      $idParaSerEditado= $_POST['id'];
      $novoNome = $_POST['nomeNovo'];
      $precoNovo = $_POST['precoNovo'];
  
      $arqProduto = fopen("produto.txt","r")or die("Arquivo não encontrado.");
      $arqProdutoNovo = fopen("arquivotemp.txt", "w")or die("Arquivo temporário não foi criado.");

      $x = 0;
      $sucesso = 0;
    while(!feof($arqProduto)){
        $linha[] = fgets($arqProduto);
        $colunaDados = explode(";", $linha[$x]);
        $id = $colunaDados[0];
        $nome = $colunaDados[1];
        $valor = $colunaDados[2];    

            If(!($idParaSerEditado == $id))
              {
              If($id != NULL && $nome != NULL && $quantidade != NULL){
              $texto1 = $id . ";" . $nome . ";" . $valor;
              fwrite($arqProdutoNovo, $texto1) ;
                          $sucesso = 1;
              }

            }
              $x++;
            }
      fclose($arqProduto); 
      fclose($arqProdutoNovo); 
      unlink( "produto.txt");
      rename("arquivotemporario.txt", "produto.txt");
    
  if($sucesso == 1){
    echo"Produto excluído!";
  }
  else{
    echo"Não foi possível excluir o produto!";
  }
       }
     ?>
  <section class="container">
    <h1>Excluir produto</h1>
    <form action="excluit_carrinho.php" method="POST" id="formulario">
      <input type = "number" placeholder="Digite o id do produto" name="id" required>
      <br>
      <input type = "submit">
    </form>
        <a href="index.php">Voltar</a>
  </section>
  </body>
</html>
