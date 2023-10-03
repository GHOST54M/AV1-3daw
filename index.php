<?php
    $arq = fopen("produto.txt","r")or die("Não foi possível abrir o arquivo.");
    $i = 0;
    $linhas[] = fgets($arq);
?>
<html>
  <head>
    <title>Loja Online</title>
    <style>
    #tabela, #operacoes_menu, #formulario{
    display: flex;
    flex-direction: column;
    align-items: center;

    }
    #tabela > a{
        margin: 20px;
    }
    #cabecalho > td{
        font-weight: 700;
        font-size: 20px;
        padding: 5px;
        background-color:lightcoral;
    }
    .campo{
        margin: 10px;
        background-color:lightgray;     
    }
    #formulario, #formulario > input{
    margin-top:10px;
 
    }
      
  </style>
  </head>
  
  <body>
    <main>
    <section id="tabela">
        <h1>Lista de produtos</h1>
        <table>
            <tr id="cabecalho"><td>ID:</td><td>Nome:</td>        <td>Valor:</td></tr>
            <?php
            while (!feof($arq)) {
                $linhas[] = fgets($arq);
                $dados = explode(";", $linhas[$i]);
                $id = $dados[0];
                $nome = $dados[1];
                $valor = $dados[2];
                echo "<tr class='campo'>";
                echo "<td>" . $id . "</td>";
                echo "<td>" . $nome . "</td>";
                echo "<td> R$" . $valor. "</td>";
                echo "</tr>";
                $i++;
    }
            ?>

        </table>
    </section>
      <section id="operacoes_menu">
              <form method="POST" id="formulario" action="adicionar_carrinho.php">
                
        <input type="number" name="id" placeholder="Digite o ID do produto" required>
        <input type="number" name="quantidade" placeholder="Digite a quantidade do produto" required>
        <input type="submit" value="Adicionar">
      </form>
        <a href="ver_carrinho.php">Visualizar carrinho</a>
          </section>
</main>
<?php
    fclose($arq);
?>
  </body>
</html>