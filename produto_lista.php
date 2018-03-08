<?php

require_once 'helpers.php';

require_once 'header.html';

require_once "connect.php";

require_once "produto_data_base.php";
?>

<table class="table table-stripped table-bordered">
    <tr>
        <th>Nome</th>
        <th>Preco</th>
        <th>Descricao</th>
        <th>Categoria</th>
        <th>Ações</th>
    </tr>
    <?php
    
        $products = all();
        
        foreach ($products as $product) {
    ?>
        <tr>
            <td><?=$product->nome?></td>
            <td><?=$product->preco?></td>
            <td><?=$product->descricao?></td>
            <td><?=$product->cat_nome?></td>
            <td>
                <a class="btn btn-primary" href="produto-update.php">Alterar</a>
                <a class="btn btn-primary" href="produto-update.php">Escluir</a>
            </td>
        </tr>
    <?php
        }
    
    ?>
</table>


<?php
require_once "footer.html";
?>