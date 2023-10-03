<html>
  <head>
    <title>Editar</title>
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
      $quantidadeNova = $_POST['quantNova'];
  
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
      
            If($idParaSerEditado == $id)
              {
              $texto2  = $id . ";" . $nome . ";" . $quantidadeNova . ";" . $valor;
              fwrite($arqCarrinhoNovo, $texto2) ;
              $sucesso = 1;   
            }
            else{
              IF($id != NULL && $nome != NULL && $quantidade != NULL){
              $texto1 = $id . ";" . $nome . ";" . $quantidade . ";" . $valor;
              fwrite($arqCarrinhoNovo, $texto1) ;
              }
            }
              $x++;
            }
      fclose($arqCarrinho); 
      fclose($arqCarrinhoNovo); 
      unlink( "carrinho.txt");
      rename("arquivotemporario.txt", "carrinho.txt");
    
  if($sucesso == 1){
    echo"Produto editado!";
  }
  else{
    echo"Não foi possível editar o produto!";
  }
       }
     ?>
  <section class="container">
    <form action="editar_carrinho.php" method="POST" id="formulario">
      <input type = "number" placeholder="Digite o id do produto" name="id" required>
      <input type = "number" placeholder="Digite a nova quantidade" name="quantNova" required>
      <input type = "submit">
    </form>
        <a href="ver_carrinho.php">Voltar</a>
  </section>
  </body>
</html>