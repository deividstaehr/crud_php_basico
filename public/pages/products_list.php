<?php
    define('__APP_ROOT__', substr(dirname(__DIR__), 0, strpos(dirname(__DIR__),'\public')));
    require_once __APP_ROOT__ . '/public/pages/header.php';

    $productClass = new App\Product;
    $products = $productClass->all();
?>

<table class="table table-stripped table-bordered">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Preco</th>
            <th>Descricao</th>
            <th>Categoria</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
    <?php
        foreach ($products as $product) {
    ?>
        <tr>
            <td><?=$product->nome?></td>
            <td><?=$product->preco?></td>
            <td><?=$product->descricao?></td>
            <td><?=$product->cat_nome?></td>
            <td>
                <a class="btn btn-primary" href="product_update.php">Alterar</a>
                <a class="btn btn-primary" href="product_delete.php">Excluir</a>
            </td>
        </tr>
    <?php
        }
    
    ?>
    </tbody>
</table>


<?php
    // require_once "footer.html";
?>
