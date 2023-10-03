<?php
    $arq = fopen("carrinho.txt","r")or die("Não foi possível abrir o arquivo.");
    $i = 0;
    $linhas[] = fgets($arq);
?>
<html>
  <head>
    <title>Ver carrinho</title>
  </head>
  <style>
    #container{
    display: flex;
    flex-direction: column;
    align-items: center;
    }
    section > a{
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
  #container2, #botao_voltar{
    display:flex;
    justify-content: center;
  }
  </style>
  <body>
<main>
    <section id="container">
        <h1>Seu carrinho:</h1>
        <table>
            <tr id="cabecalho"><td>ID:</td><td>Produto:</td><td>Quantidade:</td><td>Valor unitário:</td><td>Editar</td><td>Excluir</td></tr>
            <?php
            while (!feof($arq)) {
                $linhas[] = fgets($arq);
                $dados = explode(";", $linhas[$i]);
                $id = $dados[0];
                $nome = $dados[1];
                $quantidade = $dados[2];
                $valorunitatio= $dados[3];
                echo "<tr class='campo'>";
                echo "<td>" . $id . "</td>";
                echo "<td>" . $nome . "</td>";
                echo "<td>" . $quantidade . "</td>";
                echo "<td>R$" . $valorunitatio . "</td>";
                echo "<td>
                <a href='editar_carrinho.php?'>
                <img src='editar.png' 
                style='
                height: 50px;
                width: 50px;
                '>
                </a>
                </td>";   
                echo "<td><a href='excluit_carrinho.php?'>
                <img src='excluir.png'
                    style='
                height: 50px;
                width: 50px;
                '>
                </a>
                </td>";   
                echo "</tr>";
                $i++;
    }
            ?>

        </table>
    </section>
 
  <section id="botao_voltar">
        <a href="index.php">Voltar</a>
  </section>
</main>
<?php
    fclose($arq);
?>
  </body>
</html>