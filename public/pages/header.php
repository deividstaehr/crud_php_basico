<?php
    require_once __APP_ROOT__ . '/config/config.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/<?php echo Core\Path::load('ASSETS'); ?>/public/css/loja.css">
    <link rel="stylesheet" href="/<?php echo Core\Path::load('ASSETS'); ?>/public/css/bootstrap.min.css">
    <title>Minha Loja</title>
</head>
<body>

    <!-- navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a href="index.php" class="navbar-brand">Minha Loja</a>
            </div>
            <div>
                <ul class="nav navbar-nav">
                    <li><a href="">Cadastrar Produto</a></li>
                    <li><a href="pages/products_list.php">Produtos</a></li>
                    <li><a href="">Sobre</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="principal">