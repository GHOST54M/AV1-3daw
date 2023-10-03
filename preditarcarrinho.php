<html>
  <head>
    <title>Editar produto</title>
    <style>
      form{
        display:flex;
      }
    </style>
  </head>
  <body>
    <form method="POST" action="editar_carrinho.php">
      <input type="hidden" name="id"  value="<?php $id = $_GET['$id']; ?>" >
      <input type="number" placeholder="Digite a nova quantidade" name="quantNova" required>
      <input type="submit">
    </form>
    <a href="index.php">Voltar</a>
  </body>
</html>