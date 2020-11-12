<?php

if (!isset($_GET['type'])) {
    http_response_code(400);
    die('Need to set type of data!');
}

$type = $_GET['type'];

// Try to connect to database
try {
    $db = new PDO(
        'mysql:host=mysql;dbname=seatsnet',
        'root',
        'root'
    );
} catch (Exception $e) {
    http_response_code(500);
    die(json_encode([$e->getCode(), $e->getMessage()]));
}

/**
 * @param PDO $db connection
 * @param string $table name of table
 * @param string|null $parent parent table
 * @return array[]
 */
function getGeoData(PDO $db, string $table, ?string $parent = null): array
{
    $query = 'SELECT * FROM ' . $table;

    if ($parent && isset($_GET[$parent]) && !empty($_GET[$parent])) {
        $parentId = $_GET[$parent];
        $query .= ' WHERE ' . $parent . '_id = :' . $parent;
        $statement = $db->prepare($query);
        $statement->execute([$parent => (int)$parentId]);
    } else {
        $statement = $db->query($query);
    }

    if ($statement === false) {
        die(json_encode($db->errorInfo()));
    }

    return array_map(function ($item) {
        return ['id' => $item['id'], 'name' => $item['name']];
    }, $statement->fetchAll());
}

switch ($type) {
    case 'country':
        echo json_encode(['country' => getGeoData($db, 'country')]);
        break;
    case 'region':
        echo json_encode(['region' => getGeoData($db, 'region', 'country')]);
        break;
    case 'city':
        echo json_encode(['city' => getGeoData($db, 'city', 'region')]);
        break;
    default:
        echo 'Incorrect type';
};