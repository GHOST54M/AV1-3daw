<html>
  <head>
    <title>Inserir</title>
  </head>
  <style>
    section{
    display: flex;
    flex-direction: column;
    align-items: center;
    height: 500px;
    }
  </style>

  <body>
    <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
      $id = $_POST['id'];
      $nome = $_POST['nome'];
      $valor= $_POST['preco'];

    $arq = fopen("produto.txt","a")or die("Não foi possível criar o arquivo.");
    $linha = $id . "; " . $nome . "; " . $valor . "\n";
    fwrite($arq,$linha);
    fclose($arq);
    echo"<center>Produto cadastrado!</center>";
}
     ?>
     <main>
        <section>
            <h1>Cadastrar Produto</h1>
    <form method="POST" action="inserir.php">
      <h2>ID: </h2>
      <input type="number" name="id">
      <br>
      <h2>Nome:</h2>
      <input type="text" name="nome">
      <br>
      <h2>Preço:</h2>
      <input type="text" name="preco">
      <br>
      <br>
      <input type="submit">
    </form>
    <a href="index.php">Voltar</a>
        </section>

        <main>
  </body>
</html>