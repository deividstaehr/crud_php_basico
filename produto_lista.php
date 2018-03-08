<?php
require_once "cabecalho.html";

require_once "conecta.php";

require_once "produto_data_base.php";
?>

<table class="table table-stripped table-bordered">
    <tr>
        <th>Nome</th>
        <th>Preco</th>
        <th>Descricao</th>
        <th>Categoria</th>
        <th></th>
    </tr>
    <?php
    
        $produtos = listaProdutos($conexao);
        
        foreach ($produtos as $produto) {
    ?>

            <td><?=$produto["nome"]?></td>
            <td><?=$produto["preco"]?></td>
            <td><?=$produto["descricao"]?></td>
            <td><?=$produto["cat_nome"]?></td>
            <td>
                <a class="btn btn-primary" href="produto-update.php">Alterar</a>
            </td>

    <?php
        }
    
    ?>
</table>


<?php
require_once "footer.html";
?>