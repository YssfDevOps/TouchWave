<?php

function filtrarCategoria(array $categoria): array
{
    $cateogriaFiltrada['id'] = $categoria['id'];
    $cateogriaFiltrada['nom'] = htmlentities($categoria['nom'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $cateogriaFiltrada['imatge'] = htmlentities($categoria['imatge'], ENT_QUOTES | ENT_HTML5, 'UTF-8');

    return $cateogriaFiltrada;
}

/**
* @return array
*/
function getCategories(): array
{
    $conn = getConn();
    $sql = ("SELECT * FROM categoria");
    $stmt = pg_query($conn,$sql);
    $filas = pg_fetch_all($stmt);
    #var_dump($filas);
    #$stmt -> execute();
    foreach ($filas as &$categoria)
    {
        $categoria = filtrarCategoria($categoria);
    }
    pg_close($conn);

    return $filas;
}

/**
 * @param int $categoryId
 * 
 * @return array
 */
function getCategoryById(int $categoryId): array
{
    $conn = getConn();
    $sql = ("SELECT * FROM categoria WHERE id = $categoryId"); #Nose si aixo funciona
    $stmt = pg_query($conn,$sql);
    $fila = pg_fetch_assoc($stmt);
    #$stmt -> execute();
    pg_close($conn);
    return filtrarCategoria($fila);
}

?>
