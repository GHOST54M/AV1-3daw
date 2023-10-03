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
      $idParaSerEditado= $_POST['id'];
  Error_reporting(0);
      $arqCarrinho = fopen("carrinho.txt","r")or die("Arquivo não encontrado.");
      $arqCarrinhoNovo = fopen("arquivotemporario.txt", "w")or die("Arquivo temporário não foi criado.");

      $x = 0;
      $sucesso = 0;
    while(!feof($arqCarrinho)){
        $linha[] = fgets($arqCarrinho);
        $colunaDados = explode(";", $linha[$x]);
        $id = $colunaDados[0];
        $nome = $colunaDados[1];
        $quantidade = $colunaDados[2];
        $valor = $colunaDados[3];    
      
            If(!($idParaSerEditado == $id))
              {
              If($id != NULL && $nome != NULL && $quantidade != NULL){
              $texto1 = $id . ";" . $nome . ";" . $quantidade . ";" . $valor;
              fwrite($arqCarrinhoNovo, $texto1) ;
                          $sucesso = 1;
              }

            }
              $x++;
            }
      fclose($arqCarrinho); 
      fclose($arqCarrinhoNovo); 
      unlink( "carrinho.txt");
      rename("arquivotemporario.txt", "carrinho.txt");
    
  if($sucesso == 1){
    echo"Produto excluído!";
  }
  else{
    echo"Não foi possível excluir o produto!";
  }
       }
     ?>
  <section class="container">
    <form action="excluit_carrinho.php" method="POST" id="formulario">
      <input type = "number" placeholder="Digite o id do produto" name="id" required>
      <input type = "submit">
    </form>
        <a href="ver_carrinho.php">Voltar</a>
  </section>
  </body>
</html>