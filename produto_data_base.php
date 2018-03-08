<?php

function listaProdutos($pdo) {
    
    $sql = "
        SELECT *
          FROM produtos AS pro
          JOIN categorias AS cat
               ON pro.categoria_id = cat.categoria_id
    ";
    
    $query = $pdo->prepare($sql);
    $query->execute();
    
    return $query->fetchAll();
}