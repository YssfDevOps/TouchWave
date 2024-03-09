<?php

/**
 * @param int $categoryId
 * 
 * @return array
 */
function getProductByCategory(int $categoryId): array
{
    $conn = getConn();

    $sql = 'SELECT id, nom, preu, imatge
            FROM producte
            WHERE categoria_id = $1
            ORDER BY nom';
    
    $stmt = pg_prepare($conn, "product_by_category_query", $sql);
    $result = pg_execute($conn, "product_by_category_query", array($categoryId));

    $filas = pg_fetch_all($result);
    pg_close($conn);

    return $filas;
}

/**
 * @param int $productId
 * 
 * @return array
 */
function getProductById(int $productId): array
{

    $conn = getConn();

    $sql = 'SELECT *
            FROM producte
            WHERE id = $1
            ORDER BY nom';

    $stmt = pg_prepare($conn, "product_query", $sql);
    $result = pg_execute($conn, "product_query", array($productId));

    $fila = pg_fetch_assoc($result);
    pg_close($conn);

    return $fila;
}

/**
 * @param int 
 * 
 * @return array
 */
function getAllProducts(): array
{
    $conn = getConn();

    $sql = 'SELECT *
            FROM producte
            ORDER BY nom';

    $stmt = pg_prepare($conn, "all_product_query", $sql);
    $result = pg_execute($conn, "all_product_query", array());

    $tot = pg_fetch_all($result);
    pg_close($conn);

    return $tot;
}

function updateStock(array $params)
{
    $conn = getConn();

    $sql = 'UPDATE producte SET quantitat = $2
            WHERE id = $1';

    $result = pg_query_params($conn, $sql, $params);

        
    if ($result !== false) {
        $row = pg_fetch_assoc($result);
    } else {
        $row = []; // or any default value you prefer for failure
    }

    pg_close($conn);

    // Check response
    return $row != false;
}

?>