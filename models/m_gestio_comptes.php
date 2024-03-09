<?php


function insertUser(array $params): bool
{

    $conn = getConn();

    $sql = 'INSERT INTO usuari (email, nom, cognom, telefon, data_naixement, codi_postal, adreca, contrasenya, imatge)
            VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9)';

    $ret = pg_query_params($conn, $sql, $params);
    pg_close($conn);

    # We do this since ret may not be bool
    return $ret != false;
}

function getDataFromMail($email)
{
    $conn = getConn();
    $sql = ("SELECT id, email, nom, cognom, telefon, data_naixement, codi_postal, adreca, imatge FROM usuari WHERE email = $1");
    $result = pg_query_params($conn, $sql, array($email));

    $row = pg_fetch_assoc($result);

    pg_close($conn);
    return $row;
}

function getPassFromMail($email)
{
    $conn = getConn();
    $sql = ("SELECT contrasenya FROM usuari WHERE email = $1");
    $result = pg_query_params($conn, $sql, array($email));

    $ret = pg_fetch_result($result, 0, 0);
    pg_close($conn);
    return $ret;
}

function checkMail($email): bool
{
    $conn = getConn();
    $sql = ("SELECT COUNT(*) FROM usuari WHERE email = $1");
    $result = pg_query_params($conn, $sql, array($email));

    if (!$result) {
        echo "Error in query: " . pg_last_error($conn);
        return false;
    }

    $count = pg_fetch_result($result, 0, 0);
    pg_close($conn);

    return $count > 0;
}

function updateAccount(array $params)
{
    $conn = getConn();

    $sql = 'UPDATE usuari SET email=$2, nom=$3, cognom=$4, telefon=$5, data_naixement=$6, codi_postal=$7, adreca=$8, imatge=$9
    WHERE id = $1 RETURNING *';

    $result = pg_query_params($conn, $sql, $params);

    if ($result !== false) {
        $row = pg_fetch_assoc($result);
    } else {
        $row = []; // or any default value you prefer for failure
    }

    pg_close($conn);

    return $row;
}
?>