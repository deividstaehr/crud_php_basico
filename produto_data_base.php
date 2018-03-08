<?php

function all() {
    $pdo = getConnection();

    $sql = "
        SELECT pro.*, cat.nome AS cat_nome
          FROM produtos AS pro
          JOIN categorias AS cat
               ON pro.categoria_id = cat.id
    ";
    
    $query = $pdo->prepare($sql);
    $query->execute();
    
    return $query->fetchAll();
}