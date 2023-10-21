<html>
  <head>
    <title>Editar</title>
    <style>

    #formulario, .container{
    display: flex;
    flex-direction: column;
    align-items: center;
    height: 300px;
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
      
            If($idParaSerEditado == $id)
              {
              $texto2  = $id . ";" . $novoNome . ";" . $precoNovo;
              fwrite($arqProdutoNovo, $texto2) ;
              $sucesso = 1;   
            }
            else{
              IF($id != NULL && $nome != NULL && $quantidade != NULL){
              $texto1 = $id . ";" . $nome . ";" . $valor;
              fwrite($arqProdutoNovo, $texto1) ;
              }
            }
              $x++;
            }
      fclose($arqProduto); 
      fclose($arqProdutoNovo); 
      unlink( "produto.txt");
      rename("arquivotemp.txt", "produto.txt");
    
  if($sucesso == 1){
    echo"Produto editado!";
  }
  else{
    echo"Não foi possível editar o produto!";
  }
       }
     ?>
  <section class="container">

    <h1>Editar produto</h1>
      <form action="editar_carrinho.php" method="POST" id="formulario">

        <input type = "number" placeholder="Digite o id do produto" name="id" required>
        <br>
        <input type = "number" placeholder="Digite novo nome do produto" name="nomeNovo" required>
        <br>
        <input type = "number" placeholder="Digite o novo preço" name="precoNovo" required>
        <br>
        <input type = "submit">

      </form>

        <a href="index.php">Voltar</a>
  </section>
  </body>
</html>
