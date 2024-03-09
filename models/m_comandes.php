<?php

/**
 * @param array $params
 * 
 * @return int iD of the new command
 */
function newCommanda(array $params): array
{
    $conn = getConn();

    $sql = 'INSERT INTO comanda (data_creacio, numero_elements, import_total, usuari_id)
            VALUES ($1, $2, $3, $4) RETURNING *';

    $result = pg_query_params($conn, $sql, $params);

    
    if ($result !== false) {
        $row = pg_fetch_assoc($result);
    } else {
        $row = []; // or any default value you prefer for failure
    }

    pg_close($conn);

    return $row;
}

/**
 * @param array $params
 * 
 * @return int iD of the new command
 */
function addLineToCommand(array $params): array
{
    $conn = getConn();

    $sql = 'INSERT INTO linia_comanda (nom_producte, quantitat, preu_unitari, preu_total, comanda_id, producte_id)
            VALUES ($1, $2, $3, $4, $5, $6) RETURNING *';

    $result = pg_query_params($conn, $sql, $params);

    
    if ($result !== false) {
        $row = pg_fetch_assoc($result);
    } else {
        $row = []; // or any default value you prefer for failure
    }

    pg_close($conn);

    return $row;
}

function genNextDate($textDate) {
    // Convert the text date to a DateTime object
    $dateObject = DateTime::createFromFormat('d/m/Y', $textDate);

    // Check if the conversion was successful
    if ($dateObject === false) {
        return "Invalid date format";
    }

    // Add one week to the date
    $dateObject->add(new DateInterval('P1W'));

    // Format the result back to dd/mm/yyyy
    $resultDate = $dateObject->format('d/m/Y');

    return $resultDate;
}

function getUserCommands(array $params)
{
    $conn = getConn();

    $sql = 'SELECT * FROM comanda WHERE usuari_id = $1';

    $result = pg_query_params($conn, $sql, $params);

    
    $rows = [];
    while ($row = pg_fetch_assoc($result)) {
        $rows[] = $row;
    }

    pg_close($conn);

    return $rows;
}

function getCommandLines(array $params)
{
    $conn = getConn();

    $sql = 'SELECT * FROM linia_comanda WHERE comanda_id = $1';

    $result = pg_query_params($conn, $sql, $params);

    
    $rows = [];
    while ($row = pg_fetch_assoc($result)) {
        $rows[] = $row;
    }

    pg_close($conn);

    return $rows;
}
?> 